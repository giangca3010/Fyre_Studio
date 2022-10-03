<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_vi');
            $table->text('desc_en');
            $table->text('desc_vi');
            $table->string('slug_en');
            $table->string('slug_vi');
            $table->string('contact_en');
            $table->string('contact_vi');
            $table->text('box_contact_en');
            $table->text('box_contact_vi');
            $table->integer('latitude');
            $table->integer('longitude');
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
        Schema::dropIfExists('contacts');
    }
}
