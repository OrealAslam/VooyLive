<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class NewUserRegisterAdminNotification extends Mailable
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
        return $this->from(env('MAIL_USERNAME'), 'New Registration - VOOY Marketing')
                    ->view('emails.newUserRegisterAdminNotification')
                    ->subject('newUserRegisterAdminNotification')
                    ->with([
                        'firstName' => $user->firstName,
                        'lastName' => $user->lastName,
                        'plan' => $user->plan,
                        'email' => $user->email,
                    ]);
    }
}
