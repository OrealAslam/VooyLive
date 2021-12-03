<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscribeUs extends Model
{
    protected $table = 'subscribe_us';

    protected $fillable = ['email'];
}
