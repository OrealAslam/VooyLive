<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->tinyInteger('availability')->default(0);
            $table->string('address')->nullable();
            $table->tinyInteger('upload_image')->default(0);
            $table->tinyInteger('neighborhood')->default(0);
            $table->tinyInteger('rush_delivery')->default(0);
            $table->tinyInteger('custom_charge')->default(0);
            $table->string('rush_delivery_day')->nullable();
            $table->string('rush_delivery_charge')->nullable();
            $table->string('custom_design_charge')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('city');
        });
    }
}
