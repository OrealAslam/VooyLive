<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserToReportRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('userId')->on('users')
                  ->onDelete('cascade');
            $table->integer('report_id')->unsigned();
            $table->foreign('report_id')
                  ->references('reportId')->on('reports')
                  ->onDelete('cascade');
            $table->timestamps();
            $table->unique(['user_id', 'report_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_reports', function (Blueprint $table) {
            $table->dropForeign('user_reports_user_id_foreign');
            $table->dropForeign('user_reports_report_id_foreign');
        });
    }
}
