<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateNanniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nannies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('main_image')->nullable();
            $table->string('name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('age')->nullable();
            $table->string('religion')->nullable();
            $table->integer('children')->nullable();
            $table->string('job')->nullable();
            $table->integer('salary')->nullable();
            $table->integer('experience')->nullable();
            $table->string('marital_status')->nullable();
            // $table->string('education')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('arabic_lang')->nullable();
            $table->string('english_lang')->nullable();
            $table->longText('about')->nullable();
            $table->string('skills')->nullable();
            $table->string('gallery')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->bigInteger('reserve_id')->unsigned()->nullable();
            $table->foreign('reserve_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('broker_id')->unsigned();
            $table->foreign('broker_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('status')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nannies');
    }
}
