<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientboardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientboard', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gameid');
            $table->foreign('gameid')->references('id')->on('game')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('clientid')->default(0);
            $table->integer('boardid');
            $table->foreign('boardid')->references('id')->on('board')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('firstzinc')->default(false);
            $table->boolean('secondzinc')->default(false);
            $table->integer('priceid')->default(0);
            $table->boolean('bingo')->default(false);
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
        Schema::dropIfExists('clientboard');
    }
}
