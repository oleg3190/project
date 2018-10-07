<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestions extends Migration
{

    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->text('text');
            $table->string('img')->nullable();
            $table->string('button')->nullable();
            $table->unsignedInteger('victorians_id');
            $table->foreign('victorians_id')->references('id')->on('victorians');
            $table->timestamps();
        });

    }


    public function down()
    {
        //
    }
}
