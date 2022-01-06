<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversalSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universal_school', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->string('city');
            $table->boolean('early');
            $table->boolean('kindergarten');
            $table->boolean('elementary');
            $table->boolean('junior');
            $table->boolean('senior');
            $table->boolean('post');
            $table->string('address');
            $table->char('lat',20);
            $table->char('long',20);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
