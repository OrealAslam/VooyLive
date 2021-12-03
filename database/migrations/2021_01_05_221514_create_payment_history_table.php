<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('category_type')->nullable()->comment('0 = credit, 1 = product');
            $table->string('amount')->nullable();
            $table->string('total_amount')->nullable();
            $table->integer('payment_type')->nullable()->comment('0 = stripe, 1 = credit, 2 = stripe/credit');
            $table->longText('stripe_response')->nullable();
            $table->longText('credit_detail')->nullable();
            $table->longText('products')->nullable();
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
        Schema::dropIfExists('payment_history');
    }
}
