<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDebit extends Model
{
    protected $table = 'user_debits';

    protected $fillable = ['user_id', 'payment_history_id','debit'];
}
