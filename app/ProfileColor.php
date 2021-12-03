<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileColor extends Model
{
    protected $table = 'profile_colors';

    protected $fillable = ['name','headings','sub_headings','footer','background_1','background_2','icons_only'];
}
