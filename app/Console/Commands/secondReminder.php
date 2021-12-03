<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Mail\firstReminderEmail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Subscription;
use Illuminate\Support\Facades\DB;
use App\Jobs\ProcessEmails;
use App\Http\Controllers\Controller;

class secondReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'secondReminder:send';
    protected $daysBeforeExpire = 1;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email to the users whose trial is expired today';

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
        echo 'secondReminder'.date("Y-m-d H:i:s").'<br>';
        //echo '<pre>';
        $allUsers = DB::table('users as u')
                    ->leftJoin(DB::raw('(SELECT * FROM subscriptions ORDER BY id DESC) sub'), 'u.userId','=','sub.user_userId')
                    ->where('u.role', 'client')
                    //->whereRaw('DATE_FORMAT(sub.trial_ends_at, "%Y-%m-%d") = ?)', [date("Y-m-d")])
                    ->whereRaw('DATE_FORMAT(sub.trial_ends_at, "%Y-%m-%d") = DATE_ADD(?, INTERVAL '.$this->daysBeforeExpire.' DAY)', [date("Y-m-d")])
                    ->whereNotNull('sub.created_at')
                    ->orderBy('u.userId')
                    ->get();
                    //->toSql();
        //print_r($allUsers);
        //print_r($allUsers->toArray());
        //die();
        

        foreach ($allUsers as $user) {
            //send email
            $data = array (
                'firstName' => $user->firstName,
                'lastName' => $user->lastName,
                'userEmail' => $user->email,
                'type' => 'secondReminder',
            );
            //Mail::to($user->email)->send(new SevenDayReminderEmail($data));
            //dispatch(new ProcessEmails($data));
            //$emailJob = (new ProcessEmails($data))->delay(Carbon::now()->addSeconds(1))
            //dispatch($emailJob);
            ProcessEmails::dispatch($data)->delay(Carbon::now()->addSeconds(2))->onQueue('low');
            //ProcessEmails::dispatch($podcast)->delay(now()->addMinutes(10));
        }
    }
}
