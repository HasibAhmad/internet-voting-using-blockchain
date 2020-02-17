<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotersTable extends Migration
{
    public function up()
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->bigInteger('election_id')->unsigned();
            $table->foreign('election_id')->references('id')->on('elections');
            $table->longText('private_key');
            $table->longText('public_key');
            $table->string('bitcoin_address');
            $table->integer('network');
            $table->string('verify_token');
            $table->boolean('verified')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('voters');
    }
}
