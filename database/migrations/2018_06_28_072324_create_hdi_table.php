<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHdiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('house_details_infographics')) {
            Schema::create('house_details_infographics', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->tinyInteger('status')->default(1);
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')
                      ->references('userId')->on('users')
                      ->onDelete('cascade');
                $table->string('stripe_id')->nullable();
                $table->double('total')->nullable();
                $table->enum('type', ['trial', 'paid']);
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
        Schema::dropIfExists('house_details_infographics', function (Blueprint $table) {
            $table->dropForeign('hdi_user_id_foreign');
        });
    }
}
