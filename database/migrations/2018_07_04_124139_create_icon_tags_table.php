<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIconTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('icon_tags')) {
            Schema::create('icon_tags', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');

                $table->integer('icon_id')->unsigned();
                $table->foreign('icon_id')->references('id')->on('icons')->onDelete('cascade');

                $table->integer('tag_id')->unsigned();
                $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
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
        Schema::dropIfExists('icon_tags', function (Blueprint $table) {
            $table->dropForeign('icon_tags_icon_id_foreign');
            $table->dropForeign('icon_tags_tag_id_foreign');
        });
    }
}
