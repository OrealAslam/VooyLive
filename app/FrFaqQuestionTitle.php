<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrFaqQuestionTitle extends Model
{	
	/**
	 * Write code  
	 *
	 * @return response()
	 */
    protected $fillable =['title'];
    
    /**
    * Write code on function
    *
    * @return response()
    */
    public function frFaqQuestionAnswer()
    {   
        return $this->hasMany(FrFaqQuestionAnswer::class, 'fr_faq_question_title_id', 'id');
    }
}
