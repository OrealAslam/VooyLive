<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserSignup;
use App\Mail\firstReminderEmail;
use App\Mail\secondReminderEmail;
use App\Mail\UserRenewal;
use App\Mail\BuyReport;
use App\Mail\UserCancel;
use App\Mail\EmailVerification;
use App\Mail\AccountActivation;
use App\Mail\NewUserRegisterAdminNotification;
use App\Mail\BuyPFSReport;
use App\Mail\BuyHDIReport;

class ProcessEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    //maximum number of times a job may be attempted
    public $tries = 3; 
    //timeout option specifies how long the Laravel queue master process will wait before killing off a child queue worker that is processing a job
    public $timeout = 120;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function retryUntil()
    {
        //return Carbon::now()->addSeconds(5);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            //Mail::to('mail@appdividend.com')->send(new SendMailable());
            switch ($this->data['type']) {
                case 'userRegister':
                    Mail::to($this->data['userEmail'])->send(new UserSignup($this->data));
                    break;
                case 'firstReminder':
                    Mail::to($this->data['userEmail'])->send(new firstReminderEmail($this->data));
                    break;
                case 'secondReminder':
                    Mail::to($this->data['userEmail'])->send(new secondReminderEmail($this->data));
                    break;
                case 'buyReport':
                    Mail::to($this->data['userEmail'])->send(new BuyReport($this->data));
                    break;
                case 'userRenewal':
                    Mail::to($this->data['userEmail'])->send(new UserRenewal($this->data));
                    break;
                case 'contactUs':
                    Mail::to($this->data['userEmail'])->send(new ContactUs($this->data));
                    break;
                case 'userCancel':
                    Mail::to($this->data['userEmail'])->send(new UserCancel($this->data));
                    break;
                case 'emailVerification':
                    Mail::to($this->data['userEmail'])->send(new EmailVerification($this->data));
                    break;
                case 'accountActivation':
                    Mail::to($this->data['email'])->send(new AccountActivation($this->data));
                    break;
                case 'newUserRegisterAdminNotification':
                    Mail::to($this->data['userEmail'])->send(new NewUserRegisterAdminNotification($this->data));
                    break;
                case 'buyPFSReport':
                    Mail::to($this->data['userEmail'])->send(new BuyPFSReport($this->data));
                    break;
                case 'buyHDIReport':
                    Mail::to($this->data['userEmail'])->send(new BuyHDIReport($this->data));
                    break;
                default:
                    // allow this - we'll have Stripe send us everything
                    // throw new \Exception('Unexpected webhook type form Stripe! '.$stripeEvent->type);
            }


        }catch(Exception $exception) {
            //echo $exception->getMessage();
            //die();
        }


    }

    /**
     * The job failed to process.
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed(Exception $exception)
    {
        // Send user notification of failure, etc...
        echo $exception->getMessage();
    }

}
