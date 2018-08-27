<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateBoardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board', function (Blueprint $table) {
            $table->increments('id');
            $table->json('view');
            $table->string('color');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE board ADD COLUMN firstrow integer[]');
        DB::statement('ALTER TABLE board ADD COLUMN secondrow integer[]');
        DB::statement('ALTER TABLE board ADD COLUMN thirdrow integer[]');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('board');
    }
}
