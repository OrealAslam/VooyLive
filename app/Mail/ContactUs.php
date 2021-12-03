<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUs extends Mailable
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
        return $this->from('pkamani13@gmail.com', 'Contact Us - VOOY Marketing')
                    ->view('emails.contactUs')
                    ->subject('Contact Us from VOOY Marketing')
                    ->with([
                        'name' => $this->data['name'],
                        'email' => $this->data['email'],
                        'phone' => isset($this->data['phone']) && !empty($this->data['phone']) ? $this->data['phone'] : '',
                        'msg' => $this->data['message'],
                    ]);
    }
}
