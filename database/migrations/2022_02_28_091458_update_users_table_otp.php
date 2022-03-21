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
            $table->dateTime('otp_created_at')->nullable();
            $table->dateTime('otp_entered_at')->nullable();
            $table->boolean('2FA_status')->default(1);
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
