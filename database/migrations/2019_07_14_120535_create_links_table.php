<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatelinksTable extends Migration
{
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('home')->nullable();
            $table->string('domestic_workers')->nullable();
            $table->string('local_domestic_workers')->nullable();
            $table->string('about')->nullable();
            $table->string('contact')->nullable();
            $table->string('sourcing_broker')->nullable();
            $table->string('sourcing_agency')->nullable();
            $table->string('recruitment_agency')->nullable();
            $table->string('sponsorship')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
