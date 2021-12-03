<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCouponFieldToPaymentHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_history', function (Blueprint $table) {
            $table->integer('coupon_code_id')->nullable();
            $table->string('coupon_code')->nullable();
        });
        DB::statement("ALTER TABLE `payment_history` CHANGE `amount` `amount` DECIMAL(11,2) NULL DEFAULT NULL;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_history', function (Blueprint $table) {
            $table->dropColumn('coupon_code_id');
            $table->dropColumn('coupon_code');
        });
    }
}
