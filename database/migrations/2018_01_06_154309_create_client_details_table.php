<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->string('title');
            $table->string('colora')->default('#000000');
            $table->string('colorb')->default('#b5a05e');
            $table->string('colorc')->default('#717071');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('photo')->nullable();
            $table->text('logo')->nullable();
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
        Schema::dropIfExists('client_details');
    }
}
