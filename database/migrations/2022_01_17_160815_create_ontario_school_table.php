<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOntarioSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ontario_school', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('level');
            $table->string('grade');
            $table->string('address');
            $table->string('city');
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
