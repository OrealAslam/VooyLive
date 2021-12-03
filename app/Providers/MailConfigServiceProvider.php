<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use App\SmtpSetting;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $emailServices = SmtpSetting::first();
        if ($emailServices) {
            $config = array(
                'driver'     => $emailServices->mail_driver,
                'host'       => $emailServices->mail_host,
                'port'       => $emailServices->mail_port,
                'username'   => $emailServices->mail_username,
                'password'   => $emailServices->mail_password,
                'encryption' => $emailServices->mail_encryption,
                'from'       => array('address' => $emailServices->mail_from_address, 'name' => $emailServices->mail_from_name),
                'sendmail'   => '/usr/sbin/sendmail -bs',
                'pretend'    => false,
            );

            Config::set('mail', $config);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
