<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmtpSetting extends Model
{
    protected $fillable=[
       'mail_driver',
       'mail_from_name' ,
       'mail_admin_email',
       'mail_encryption',
       'mail_from_address',
       'mail_password',
       'mail_port',
       'mail_username',
       'mail_host',

   ];
}
