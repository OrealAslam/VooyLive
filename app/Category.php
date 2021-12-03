<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categorys';

    protected $fillable = ['title', 'slug','type'];

    /**
     * Get the post that owns the comment.
     */
    public function product()
    {
        return $this->hasMany(Product::class, 'cat_id');
    }
}
