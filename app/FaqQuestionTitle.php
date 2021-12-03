<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqQuestionTitle extends Model
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
    public function faqQuestionAnswer()
    {   
        return $this->hasMany(FaqQuestionAnswer::class, 'faq_question_title_id', 'id');
    }
}
