<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBlogFrenchFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog_categories', function (Blueprint $table) {
            $table->text('name_fr')->nullable();         
            $table->text('description_fr')->nullable();
        });

        Schema::table('blog_posts', function (Blueprint $table) {
            $table->text('title_fr')->nullable();         
            $table->text('description_fr')->nullable();
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
