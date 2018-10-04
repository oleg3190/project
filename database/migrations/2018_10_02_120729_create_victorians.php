<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVictorians extends Migration
{

    public function up()
    {
        Schema::create('victorians', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('chanel');
            $table->string('timeStart');
            $table->string('timeInterval');
            $table->string('timeStop');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

    }


    public function down()
    {
        //
    }
}
