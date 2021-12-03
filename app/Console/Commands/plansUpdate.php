<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Plan;
use Stripe\Plan as StripePlan;
use Config;
use Carbon\Carbon;

class plansUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plansUpdate:run';
    protected static $stripeKey;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update/Sync All Plans with Stripe';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach (\App\Plan::all() as $plan) {
            $response=StripePlan::retrieve($plan->planId, ['api_key' => $this->getStripeKey()]);
            //$plan =Plan::findorfail($id);
            if ($response && $response->id) {
                $plan->planId            = $response->id;
                $plan->name              = $response->name;
                $plan->trial_period_days = $response->trial_period_days;
                $plan->interval          = $response->interval;
                $plan->amount            = $response->amount;
                $plan->status            = 1;
                $plan->updated_at        = Carbon::now();
                $plan->save();
            }
        }


    }



    public static function getStripeKey()
    {
        if (static::$stripeKey) {
            return static::$stripeKey;
        }

        if ($key = getenv('STRIPE_SECRET')) {
            //echo $key;die();
            return $key;
        }

        $key = Config::get('services.stripe.secret');
        //echo $key;die();
        return $key;
    }
}
