<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table = 'blog_categories';

    protected $fillable = ['name', 'description', 'status','name_fr','description_fr'];

    public function post()
    {
    	return $this->hasMany('App\BlogPost');
    }
}
