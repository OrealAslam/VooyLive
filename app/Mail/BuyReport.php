<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\SmtpSetting;

class BuyReport extends Mailable
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
        $mail_data  = SmtpSetting::first();
        // dd($this->data);
        return $this->from($mail_data->mail_admin_email, 'VOOY Marketing')
            ->view('emails.buyReport')
            ->subject('Thank you for your purchase')
            ->with([
                'firstName' => $this->data['firstName'],
                'lastName' => $this->data['lastName'],
                'reportId' => $this->data['reportId'],
                'userId' => $this->data['userId'],
                'orderId' => $this->data['orderId'],
                'orderReportAddress' => $this->data['orderReportAddress'],
                'orderAmount' => $this->data['orderAmount'],
                'orderDate' => $this->data['orderDate'],
            ]);
    }
}
