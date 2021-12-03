<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('icons')) {
            Schema::create('icons', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('icon_file')->nullable();
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('userId')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('icons', function (Blueprint $table) {
            $table->dropForeign('icons_user_id_foreign');
        });
    }
}
