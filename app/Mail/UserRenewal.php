<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use App\User;
use App\Plan;

class UserRenewal extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = User::where('userId', $this->data['userId'])->first();
        $plan = Plan::where('planId', $user->plan)->first();


        return $this->from(env('MAIL_USERNAME'), 'VOOY Marketing')
            ->view('emails.userRenewal')
            ->subject('Renewal on VOOY Marketing')
            ->with([
                'firstName' => $user->firstName,
                'lastName' => $user->lastName,
                'plan' => $user->plan,
                'interval' => $plan->interval,
                'total_amount' => env('CURRENCY_SYMBOL').($this->data['total_amount']/100),
                'chrage_date' => Carbon::createFromTimestamp($this->data['chrage_date']),
            ]);
    }
}
