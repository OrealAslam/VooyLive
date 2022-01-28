<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frsetting extends Model
{
    protected $table = 'frsettings';

    protected $fillable = ['name','slug','value'];
}
