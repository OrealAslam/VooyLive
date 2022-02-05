<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class BlogPost extends Model
{
    protected $table = 'blog_posts';

    protected $fillable = ['category_id','title','description','image','userId','status', 'title_fr', 'description_fr'];

    public function category()
    {
    	return $this->belongsTo('App\BlogCategory');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\BlogTag');
    }

    public function user()
    {
    	return $this->belongsTo('App\User','userId','userId');
    }
}
