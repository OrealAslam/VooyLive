<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BuyPFSReport extends Mailable
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
                    ->view('emails.buyPFSReport')
                    ->subject('Thank you for your purchase')
                    ->with([
                        'firstName' => $this->data['firstName'],
                        'lastName' => $this->data['lastName'],
                        'flyerId' => $this->data['flyerId'],
                        'userId' => $this->data['userId'],
                        'flyerName' => $this->data['flyerName'],
                        'amount' => $this->data['amount'],
                        'flyerDate' => $this->data['flyerDate'],
                    ]);
    }
}
