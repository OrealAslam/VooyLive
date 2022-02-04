<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrFaqQuestionAnswer extends Model
{
    /**
	 * Write code  
	 *
	 * @return response()
	 */
    protected $fillable =['fr_faq_question_title_id','question','description'];

    /**
    * Write code on function
    *
    * @return response()
    */
    public function frFaqQuestionTitle()
    {
        return $this->belongsTo(FrFaqQuestionTitle::class);
    }
}
