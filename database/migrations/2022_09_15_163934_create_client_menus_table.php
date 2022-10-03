<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_vi')->unique();
            $table->string('name_en')->unique();
            $table->string('slug_en')->unique();
            $table->string('slug_vi')->unique();
            $table->integer('is_active');
            $table->string('icon')->nullable();
            $table->integer('parent_id')->default(0);
            $table->integer('position');
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
        Schema::dropIfExists('client_menus');
    }
}
