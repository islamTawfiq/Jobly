<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStartsTable extends Migration
{
    public function up()
    {
        Schema::create('starts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('family')->nullable();
            $table->string('family_instruction1')->nullable();
            $table->string('family_instruction2')->nullable();
            $table->string('family_instruction3')->nullable();
            $table->string('sourcing')->nullable();
            $table->string('sourcing_instruction1')->nullable();
            $table->string('sourcing_instruction2')->nullable();
            $table->string('sourcing_instruction3')->nullable();
            $table->string('agent')->nullable();
            $table->string('agent_instruction1')->nullable();
            $table->string('agent_instruction2')->nullable();
            $table->string('agent_instruction3')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('starts');
    }
}
