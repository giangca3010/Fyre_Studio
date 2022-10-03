<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title_en')->unique()->nullable();
            $table->string('title_vi')->unique()->nullable();
            $table->string('slug_en')->unique()->nullable();
            $table->string('slug_vi')->unique()->nullable();
            $table->string('desc_en')->nullable();
            $table->string('desc_vi')->nullable();
            $table->string('image');
            $table->string('is_featured')->default(0);
            $table->string('position')->default(0);
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
        Schema::dropIfExists('banners');
    }
}
