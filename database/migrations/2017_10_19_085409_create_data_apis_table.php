<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_apis', function (Blueprint $table) {
            $table->increments('apiId');
            $table->string('url');
            $table->string('title');
            $table->string('type');
            $table->integer('sort');
            $table->text('template');
            $table->text('script');
            $table->text('container');
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
        Schema::dropIfExists('data_apis');
    }
}
