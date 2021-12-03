<?php

namespace App\Http\Controllers;

use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Transactions;
use App\Post;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Jobs\ProcessEmails;
use Illuminate\Http\Response;
use Config;

class WebhookController extends CashierController
{

    /**
     * Handle a Stripe webhook.
     *
     * @param  array  $payload
     * @return Response
     */

    protected $endpoint_secret;
    
    public function __construct()
    {
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        // You can find your endpoint's secret in your webhook settings
        $this->endpoint_secret = env('STRIPE_ENDPOINT_SECRET');
    }
    /*
    public function stripeWebhookAction(Request $request)
    {
        //$payload = @file_get_contents("php://input");
        $sig_header = $_SERVER["HTTP_STRIPE_SIGNATURE"];
        $stripeEvent = null;

        $data = $request->getContent();
        if ($data === null) {
            throw new \Exception('Bad JSON body from Stripe!');
        }

        try {
          $stripeEvent = \Stripe\Webhook::constructEvent(
            $data, $sig_header, $this->endpoint_secret
          );

        } catch(\UnexpectedValueException $e) {
          // Invalid payload
          http_response_code(400); // PHP 5.4 or greater
          exit();
        } catch(\Stripe\Error\SignatureVerification $e) {
          // Invalid signature
          http_response_code(400); // PHP 5.4 or greater
          exit();
        }

        $data = json_decode($data, true);
        $stripeEventId = $data['id'];


        // Do something with $stripeEvent
        switch ($data['type']) {
            case 'invoice.payment_succeeded':
                //$stripeSubscriptionId = $stripeEvent->data->object->lines->data[0]->id;
                $stripeSubscriptionId = $stripeEvent->data->object->subscription;
                if ($stripeSubscriptionId) {
                    $subscription = $this->updateSubscription($stripeEvent, $stripeSubscriptionId);
                    
                    //$stripeSubscription = $this->get('stripe_client')->findSubscription($stripeSubscriptionId);
                    //$subscriptionHelper->handleSubscriptionPaid($subscription, $stripeSubscription);
                }

                break;
            default:
                // allow this - we'll have Stripe send us everything
                // throw new \Exception('Unexpected webhook type form Stripe! '.$stripeEvent->type);
        }

        http_response_code(200); // PHP 5.4 or greater
   	}
    */
    public function handleInvoicePaymentSucceeded($payload)
    {
        /*
        $sig_header = $_SERVER["HTTP_STRIPE_SIGNATURE"];

        try {
            $stripeEvent = \Stripe\Webhook::constructEvent($payload, $sig_header, $this->endpoint_secret);
        } catch(\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400); // PHP 5.4 or greater
            exit();
        } catch(\Stripe\Error\SignatureVerification $e) {
            // Invalid signature
            http_response_code(400); // PHP 5.4 or greater
            exit();
        }
        */
        // Handle The Event
        $stripeEventId = $payload['id'];


        $user = $this->getUserByStripeId($payload['data']['object']['customer']);
        $subscription_id = $payload['data']['object']['subscription'];
        if ($user && $subscription_id) {

            $subscriptionRec = DB::table('subscriptions')->where('stripe_id', $subscription_id)->first();
            if ($subscriptionRec) {
                // featch current_period_end from stripe and update in local database
                $stripResponse = \Stripe\Subscription::retrieve($subscriptionRec->stripe_id);

                $oldPeriodEnd = $subscriptionRec->renews_at;
                $newPeriodEnd = Carbon::createFromTimestamp($stripResponse->current_period_end);

                DB::table('subscriptions')
                ->where('stripe_id', $subscriptionRec->stripe_id)
                ->update(['renews_at' => $newPeriodEnd]);


                $user = User::where('userId', $subscriptionRec->user_userId)->first();
                $data = [
                    'userId' => $subscriptionRec->user_userId,
                    'userEmail' => $user->email,
                ];

                if ($oldPeriodEnd) {
                    //renewal
                    $data['total_amount'] = $payload['data']['object']['total'];
                    $data['chrage_date'] = $payload['data']['object']['date'];
                    $data['type'] = 'userRenewal';
                } else {
                    //register
                    $data['type'] = 'userRegister';
                }
                ProcessEmails::dispatch($data)->delay(Carbon::now()->addSeconds(2))->onQueue('high');

                $data2 = $data;
                $data2['type'] = 'accountActivation';
                $data2['email'] = Config::get('app.activation_email_receiver');
                ProcessEmails::dispatch($data2)->delay(Carbon::now()->addSeconds(2))->onQueue('high');


            }


        }
        return new Response('Webhook Handled', 200);
    }

    public function handleChargeSucceeded($payload)
    {
        // Handle The Event
        $stripeEventId = $payload['id'];
        //echo '<pre>';
        //print_r($payload);
        $user = $this->getUserByStripeId($payload['data']['object']['customer']);
        //print_r($user);
        //die();

        //user exists
        if ($user) {
            //subscription_id will tell if user is pay as you go or monthly/yearly
            $data = array();
            if (!empty($payload['data']['object']['subscription'])) {
                //user is monthly/yearly
                $subscription_id = $payload['data']['object']['subscription'];
                $data['type'] = '';
            } else {
                //user is pay as you go
                $data['type'] = '';
            }
            $data['amount'] = $payload['data']['object']['amount'];
            $data['userId'] = $user->userId;
            $data['planId'] = $user->plan;
            $data['code'] = '';
            //'created_at' => Carbon::createFromTimestamp($payload['data']['object']['created'])
            $transactions = Transactions::create($data);
        }


        return new Response('Webhook Handled', 200);
    }
}

