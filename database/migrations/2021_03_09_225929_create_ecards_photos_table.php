<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEcardsPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecards_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ecards_categories_id')->nullable();
            $table->string('title')->nullable();
            $table->string('sample_image')->nullable();
            $table->string('blank_image')->nullable();
            $table->integer('x_image_coordinate')->nullable();
            $table->integer('x_text_coordinate')->nullable();
            $table->integer('y_image_coordinate')->nullable();
            $table->integer('y_text_coordinate')->nullable();
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
        Schema::dropIfExists('ecards_photos');
    }
}
