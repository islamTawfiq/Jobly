<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportingCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('importing_countries', function (Blueprint $table) {
           $table->engine = 'InnoDB';
           $table->increments('id')->index();
           $table->string('code')->nullable();
           $table->string('name');
           $table->integer('phonecode');
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
        Schema::dropIfExists('importing_countries');
    }
}
