<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_post_blog_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blog_post_id')->unsigned();
            $table->foreign('blog_post_id')->references('id')->on('blog_posts');

            $table->integer('blog_tag_id')->unsigned();
            $table->foreign('blog_tag_id')->references('id')->on('blog_tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_post_blog_tag');
    }
}
