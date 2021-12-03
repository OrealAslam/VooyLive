<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survey', function (Blueprint $table) {
            $table->string('listing_appointments_this_week')->nullable();
            $table->string('property_this_week')->nullable();
            $table->string('escrow_this_week')->nullable();
            $table->string('transaction_close_this_week')->nullable();
            $table->string('coronavirus')->nullable();
            $table->string('expecting_lower_prices')->nullable();
            $table->string('buyers_withdraw')->nullable();
            $table->string('market_completely_this_week')->nullable();
            $table->string('attract_buyers_this_week')->nullable();
            $table->string('transaction_fall_escrow_this_week')->nullable();
            $table->string('transaction_first_time_buyer')->nullable();
            $table->string('last_closed_transaction')->nullable();
            $table->string('last_closed_transaction_other')->nullable();
            $table->string('residence_located')->nullable();
            $table->string('next_week_listing_will_go')->nullable();
            $table->string('next_week_sales_will_go')->nullable();
            $table->string('next_week_prices_will_go')->nullable();
            $table->string('transactions_typical_year')->nullable();
            $table->string('constitutes_majority_of_business')->nullable();
            $table->string('constitutes_majority_of_business_other')->nullable();
            $table->string('real_estate_team')->nullable();
            $table->string('size_of_your_brokerage')->nullable();
            $table->string('size_of_your_brokerage_other')->nullable();
            $table->string('canadian_city')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('survey', function (Blueprint $table) {
            //
        });
    }
}
