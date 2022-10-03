<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_vi');
            $table->text('desc_en');
            $table->text('desc_vi');
            $table->string('slug_en');
            $table->string('slug_vi');
            $table->string('banner');
            $table->string('image_about');
            $table->string('about_en');
            $table->string('about_vi');
            $table->text('content_en');
            $table->text('content_vi');
            $table->text('box_about_en');
            $table->text('box_about_vi');
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
        Schema::dropIfExists('about_us');
    }
}
