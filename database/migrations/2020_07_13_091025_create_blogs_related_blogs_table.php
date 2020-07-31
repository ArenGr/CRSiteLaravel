<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsRelatedBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs_related_blogs', function (Blueprint $table) {
            $table->unsignedBigInteger('blog_id')->nullable()->default(NULL);
            $table->unsignedBigInteger('related_blog_id')->nullable()->default(NULL);

            $table->foreign('blog_id')->references('id')->on('blogs')->cascadeOnDelete();
            $table->foreign('related_blog_id')->references('id')->on('blogs')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs_related_blogs');
    }
}
