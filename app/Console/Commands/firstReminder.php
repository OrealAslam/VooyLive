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
use Config;

class firstReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'firstReminder:send';
    protected $daysBeforeExpire = 7;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email to the users whose trial is 7 days to expired';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->daysBeforeExpire = (Config::get('app.trial_period')) ? floor(Config::get('app.trial_period')/2) : floor($this->daysBeforeExpire/2);
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo 'firstReminder'.date("Y-m-d H:i:s").'<br>';
        //$this->info('Display this on the screen');
        //$allUsers = User::all();
        //echo Carbon::now()->toDateString();
        //die();
        //$allUsers = User::where([['role','client'],['trial_ends_at','=',Carbon::now()->toDateString()]])->whereDate()->get();
        /*
        $allUsers = User::where([['role','client']])->get();
        foreach ($allUsers as $user) {
            $user_sub = $user->subscription();
            //echo $user_substripe_id'];
        }
        print_r($allUsers->toArray());
        die();
        */

        /*
        SELECT 
        u.userId, u.firstName, sub.*
        FROM
        users u
        LEFT JOIN
        (SELECT 
        *
        FROM
        subscriptions
        ORDER BY created_at DESC
        LIMIT 1) sub ON u.userId = sub.user_userId
        WHERE
        u.role = 'client' and
        sub.created_at IS NOT NULL
        ORDER BY u.userId asc
        */

        /*
        SELECT 
            u.userId,
            u.firstName,
            u.lastName,
            u.email,
            p.name,
            p.trial_period_days,
            sub.trial_ends_at,
            DATE_ADD('2018-04-05', INTERVAL 7 DAY),
            ROUND(FLOOR(p.trial_period_days/2),0),
            DATE_ADD('2018-04-05', INTERVAL (ROUND(FLOOR(p.trial_period_days/2),0)) DAY),
            DATE_FORMAT(sub.trial_ends_at, '%Y-%m-%d')
        FROM
            `users` AS `u`
                LEFT JOIN
            (SELECT 
                *
            FROM
                subscriptions
            ORDER BY id DESC) sub ON `u`.`userId` = `sub`.`user_userId`
            left join plans p on p.planId = u.plan
        WHERE
            `u`.`role` = 'client'
                AND DATE_FORMAT(sub.trial_ends_at, '%Y-%m-%d') = DATE_ADD('2018-04-05', INTERVAL (ROUND(FLOOR(p.trial_period_days/2),0)) DAY)
                AND `sub`.`created_at` IS NOT NULL
        group by `u`.`userId`
        ORDER BY `u`.`userId` ASC   
*/



        //echo '<pre>';
        $allUsers = DB::table('users as u')
                    ->select('u.userId as userId', 'u.firstName as firstName', 'u.lastName as lastName','u.email as email','p.name as plan_name', 'p.trial_period_days as trial_period_days', 'sub.trial_ends_at as trial_ends_at', DB::raw('ROUND(FLOOR(p.trial_period_days/2),0) as remaining_days'))
                    ->leftJoin(DB::raw('(SELECT * FROM subscriptions ORDER BY id DESC) sub'), 'u.userId','=','sub.user_userId')
                    ->leftJoin('plans as p', 'u.plan','=','p.planId')
                    ->where('u.role', 'client')
                    ->whereRaw('DATE_FORMAT(sub.trial_ends_at, "%Y-%m-%d") = DATE_ADD(?, INTERVAL ROUND(FLOOR(p.trial_period_days/2),0) DAY)', [date("Y-m-d")])
                    ->whereNotNull('sub.created_at')
                    ->groupBy('u.userId')
                    ->orderBy('u.userId')
                    ->get();
                    //->toSql();
        //print_r($allUsers);
        //die();
        //print_r($allUsers->toArray());
        

        foreach ($allUsers as $user) {
            //send email
            $data = array (
                'firstName' => $user->firstName,
                'lastName' => $user->lastName,
                'userEmail' => $user->email,
                'planName' => $user->plan_name,
                'trialPeriodDays' => $user->trial_period_days,
                'trialEndsAt' => $user->trial_ends_at,
                'remainingDays' => $user->remaining_days,
                'type' => 'firstReminder',
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
