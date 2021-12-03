<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_colors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('headings')->nullable();
            $table->string('sub_headings')->nullable();
            $table->string('footer')->nullable();
            $table->string('background_1')->nullable();
            $table->string('background_2')->nullable();
            $table->string('icons_only')->nullable();
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
        Schema::dropIfExists('profile_colors');
    }
}
