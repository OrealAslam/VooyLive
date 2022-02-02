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
            $table->string('households_with_children');
            $table->string('average_household_income');
            $table->string('median_age');
            $table->string('el_name');
            $table->string('el_address');
            $table->string('el_grade');
            $table->string('el_distance');
            $table->string('ju_name');
            $table->string('ju_address');
            $table->string('ju_grade');
            $table->string('ju_distance');
            $table->string('se_name');
            $table->string('se_address');
            $table->string('se_grade');
            $table->string('se_distance');
            $table->string('one_name');
            $table->string('one_distance');
            $table->string('two_name');
            $table->string('two_distance');
            $table->string('re_name');
            $table->string('re_type');
            $table->string('re_distance');
            $table->string('bus_name');
            $table->string('bus_address');
            $table->string('bus_distance');
            $table->string('train_name');
            $table->string('train_address');
            $table->string('train_distance');
            $table->string('lib_name');
            $table->string('lib_address');
            $table->string('lib_distance');
            $table->string('res_one_name');
            $table->string('res_one_address');
            $table->string('res_one_distance');
            $table->string('res_two_name');
            $table->string('res_two_address');
            $table->string('res_two_distance');
            $table->string('bank_one_name');
            $table->string('bank_one_address');
            $table->string('bank_one_distance');
            $table->string('bank_two_name');
            $table->string('bank_two_address');
            $table->string('bank_two_distance');
            $table->string('store_one_name');
            $table->string('store_one_address');
            $table->string('store_one_distance');
            $table->string('store_two_name');
            $table->string('store_two_address');
            $table->string('store_two_distance');
            $table->string('gas_one_name');
            $table->string('gas_one_address');
            $table->string('gas_one_distance');
            $table->string('gas_two_name');
            $table->string('gas_two_address');
            $table->string('gas_two_distance');
            $table->string('cafe_one_name');
            $table->string('cafe_one_address');
            $table->string('cafe_one_distance');
            $table->string('cafe_two_name');
            $table->string('cafe_two_address');
            $table->string('cafe_two_distance');
            $table->string('gym_one_name');
            $table->string('gym_one_address');
            $table->string('gym_one_distance');
            $table->string('gym_two_name');
            $table->string('gym_two_address');
            $table->string('gym_two_distance');

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
