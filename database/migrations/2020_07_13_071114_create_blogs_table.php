<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('page_title', 255)->nullable()->default(NULL);
            $table->string('page_description', 200)->nullable()->default(NULL);
            $table->string('banner_title', 255)->default('');
            $table->string('banner_text', 255)->default('');
            $table->string('banner_slug', 255)->default('');
            $table->string('banner_slug_text', 255)->default('');
            $table->string('title', 255)->index();
            $table->string('slug', 255)->index();
            $table->text('content')->nullable()->default(null);
            $table->string('image', 255)->comment('Blog main image path');
            $table->string('image_alt', 255)->nullable()->default('');
            $table->string('image_title', 255)->nullable()->default('');
            $table->tinyInteger('publish_status', false, true)->nullable()->default('0')->comment('Blog page if blog published');
            $table->tinyInteger('trending_status', false, true)->nullable()->default('0')->comment('Blog page trending blogs');
            $table->tinyInteger('main_status', false, true)->nullable()->default('0')->comment('Blog page main blog');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
