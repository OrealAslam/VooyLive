<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportOverrideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_override', function (Blueprint $table) {
            $table->integer('id');
            $table->string('households_with_children')->nullable();
            $table->string('average_household_income')->nullable();
            $table->string('median_age')->nullable();
            $table->string('el_name')->nullable();
            $table->string('el_address')->nullable();
            $table->string('el_grade')->nullable();
            $table->string('el_distance')->nullable();
            $table->string('ju_name')->nullable();
            $table->string('ju_address')->nullable();
            $table->string('ju_grade')->nullable();
            $table->string('ju_distance')->nullable();
            $table->string('se_name')->nullable();
            $table->string('se_address')->nullable();
            $table->string('se_grade')->nullable();
            $table->string('se_distance')->nullable();
            $table->string('one_name')->nullable();
            $table->string('one_distance')->nullable();
            $table->string('two_name')->nullable();
            $table->string('two_distance')->nullable();
            $table->string('re_name')->nullable();
            $table->string('re_type')->nullable();
            $table->string('re_distance')->nullable();
            $table->string('bus_name')->nullable();
            $table->string('bus_address')->nullable();
            $table->string('bus_distance')->nullable();
            $table->string('train_name')->nullable();
            $table->string('train_address')->nullable();
            $table->string('train_distance')->nullable();
            $table->string('lib_name')->nullable();
            $table->string('lib_address')->nullable();
            $table->string('lib_distance')->nullable();
            $table->string('res_one_name')->nullable();
            $table->string('res_one_address')->nullable();
            $table->string('res_one_distance')->nullable();
            $table->string('res_two_name')->nullable();
            $table->string('res_two_address')->nullable();
            $table->string('res_two_distance')->nullable();
            $table->string('bank_one_name')->nullable();
            $table->string('bank_one_address')->nullable();
            $table->string('bank_one_distance')->nullable();
            $table->string('bank_two_name')->nullable();
            $table->string('bank_two_address')->nullable();
            $table->string('bank_two_distance')->nullable();
            $table->string('store_one_name')->nullable();
            $table->string('store_one_address')->nullable();
            $table->string('store_one_distance')->nullable();
            $table->string('store_two_name')->nullable();
            $table->string('store_two_address')->nullable();
            $table->string('store_two_distance')->nullable();
            $table->string('gas_one_name')->nullable();
            $table->string('gas_one_address')->nullable();
            $table->string('gas_one_distance')->nullable();
            $table->string('gas_two_name')->nullable();
            $table->string('gas_two_address')->nullable();
            $table->string('gas_two_distance')->nullable();
            $table->string('cafe_one_name')->nullable();
            $table->string('cafe_one_address')->nullable();
            $table->string('cafe_one_distance')->nullable();
            $table->string('cafe_two_name')->nullable();
            $table->string('cafe_two_address')->nullable();
            $table->string('cafe_two_distance')->nullable();
            $table->string('gym_one_name')->nullable();
            $table->string('gym_one_address')->nullable();
            $table->string('gym_one_distance')->nullable();
            $table->string('gym_two_name')->nullable();
            $table->string('gym_two_address')->nullable();
            $table->string('gym_two_distance')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_override');
    }
}
