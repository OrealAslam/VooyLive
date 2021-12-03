<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('report_notes')) {
            Schema::create('report_notes', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('reportId');
                $table->integer('userId');
                $table->string('point_1');
                $table->string('point_2');
                $table->string('point_3');
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
        Schema::dropIfExists('report_notes');
    }
}
