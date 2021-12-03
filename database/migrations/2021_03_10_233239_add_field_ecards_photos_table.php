<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldEcardsPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ecards_photos', function (Blueprint $table) {
            $table->string('x_greeting_coordinate')->nullable();
            $table->string('y_greeting_coordinate')->nullable();
            $table->string('x_solution_coordinate')->nullable();
            $table->string('y_solution_coordinate')->nullable();
            $table->string('x_message_coordinate')->nullable();
            $table->string('y_message_coordinate')->nullable();
            $table->string('x_signature_coordinate')->nullable();
            $table->string('y_signature_coordinate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ecards_photos', function (Blueprint $table) {
            //
        });
    }
}
