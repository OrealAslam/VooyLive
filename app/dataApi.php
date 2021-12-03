<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataApi extends Model
{
    protected $fillable=['template','url'];
    protected $primaryKey='apiId';
}
