<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserCancel extends Mailable
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
        return $this->from(env('MAIL_USERNAME'), 'VOOY Marketing')
            ->view('emails.userCancel')
            ->subject('Cancel Account on VOOY Marketing')
            ->with([
                'firstName' => $this->data['firstName'],
                'lastName' => $this->data['lastName'],
                'date' => date("Y-m-d H:i:s"),
            ]);
    }
}
