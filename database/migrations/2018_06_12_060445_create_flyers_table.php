<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('flyers')) {
            Schema::create('flyers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->tinyInteger('status')->default(1);
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')
                      ->references('userId')->on('users')
                      ->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flyers', function (Blueprint $table) {
            $table->dropForeign('flyers_user_id_foreign');
        });
    }
}
