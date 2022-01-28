<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    protected $table = 'blog_tags';

    protected $fillable = ['name'];

    public function posts()
    {
    	return $this->belongsToMany('App\BlogPost', 'blog_post_blog_tag', 'blog_tag_id', 'blog_post_id');
    }
}
