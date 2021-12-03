<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IconTag extends Model
{
    protected $table = 'icon_tags';

    public function Tag(){
    	return $this->belongsTo('App\Tag','tag_id','id');
    }
    public function Icon(){
    	return $this->belongsTo('App\Icon','icon_id','id');
    }
}
