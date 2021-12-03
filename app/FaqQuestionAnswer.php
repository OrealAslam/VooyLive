<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqQuestionAnswer extends Model
{
    /**
	 * Write code  
	 *
	 * @return response()
	 */
    protected $fillable =['faq_question_title_id','question','description'];

    /**
    * Write code on function
    *
    * @return response()
    */
    public function faqQuestionTitle()
    {
        return $this->belongsTo(FaqQuestionTitle::class);
    }
}
