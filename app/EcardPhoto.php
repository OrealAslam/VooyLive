<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EcardPhoto extends Model
{
    protected $table = 'ecards_photos';

    protected $fillable = ['ecards_categories_id','title','sample_image','blank_image','x_greeting_coordinate','y_greeting_coordinate','x_solution_coordinate','y_solution_coordinate','x_message_coordinate','y_message_coordinate','x_signature_coordinate','y_signature_coordinate'];

    /**
     * Get the post that owns the comment.
     */
    public function EcardCategoryName(){
    	return $this->belongsTo('App\EcardCategory','ecards_categories_id','id');
    }
}