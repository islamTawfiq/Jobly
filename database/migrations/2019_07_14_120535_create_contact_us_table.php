<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsTable extends Migration
{
    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('text_ar')->nullable();
            $table->string('text_en')->nullable();
            $table->string('mobile')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('contact_us');
    }
}
