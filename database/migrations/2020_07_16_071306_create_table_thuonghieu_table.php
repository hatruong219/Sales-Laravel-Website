<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableThuonghieuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuonghieu', function (Blueprint $table) {
            $table->increments('ID_Thuonghieu');

            $table->string('Nameth');

            $table->string('Address');

            $table->text('Note');

            $table->integer('ID_Loaihang')->unsigned()->nullable();
            $table->foreign('ID_Loaihang')->references('ID_Loaihang')->on('loaihang')->onDelete('cascade');

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
        Schema::dropIfExists('thuonghieu');
    }
}
