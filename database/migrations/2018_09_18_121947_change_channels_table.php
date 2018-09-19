<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeChannelsTable extends Migration
{

    public function up()
    {
        Schema::table('channels',function (Blueprint $table) {

            $table->integer('user_id')->unsigned()->default(1);
            $table->foreign('user_id')->references('id')->on('users');

        });
        //

    }


    public function down()
    {
        //
    }
}
