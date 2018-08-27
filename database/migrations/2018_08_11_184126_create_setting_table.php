<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('displayname');
            $table->string('name');
            $table->string('value');
            $table->timestamps();
        });

        DB::statement("INSERT INTO setting (displayname, name, value) VALUES('Kart Fiyatı', 'boardprice', '5'), ('1. Çinko', 'firstzinc', '25'), ('2. Çinko', 'secondzinc', '50'), ('Tombala', 'bingo', '100')");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting');
    }
}
