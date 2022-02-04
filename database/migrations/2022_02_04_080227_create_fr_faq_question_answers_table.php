<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrFaqQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fr_faq_question_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fr_faq_question_title_id')->nullable();
            $table->string('question')->nullable();
            $table->longtext('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fr_faq_question_answers');
    }
}
