<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EcardCategory extends Model
{
    protected $table = 'ecards_categories';

    protected $fillable = ['name'];
}