<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTableOtp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email_otp_code', 255)->nullable();
            $table->string('ip_address', 255)->nullable();
            $table->string('otp_created_at', 255)->nullable();
            $table->string('otp_entered_at', 255)->nullable();
            $table->string('2FA_status', 255)->default('enable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
