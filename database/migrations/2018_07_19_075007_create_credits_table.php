<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('credits')) {
            Schema::create('credits', function (Blueprint $table) {
                $table->increments('id');
                $table->string('descr')->nullable();
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id')->references('userId')->on('users');
                $table->enum('type', ['referrer', 'referral', 'admin', 'product'])->nullable();
                $table->enum('product', ['cfs', 'pfs', 'hdi'])->nullable();
                $table->integer('referred_by')->unsigned()->nullable();
                $table->foreign('referred_by')->references('userId')->on('users');
                $table->integer('referred_to')->unsigned()->nullable();
                $table->foreign('referred_to')->references('userId')->on('users');
                $table->integer('credit')->nullable();
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
        Schema::dropIfExists('credits', function (Blueprint $table) {
            $table->dropForeign('credits_user_id_foreign');
            $table->dropForeign('credits_referred_by_foreign');
            $table->dropForeign('credits_referred_to_foreign');
        });
    }
}
