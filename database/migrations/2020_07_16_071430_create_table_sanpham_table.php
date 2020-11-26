<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('ID_Sanpham');

            $table->string('Namesp');

            $table->integer('Gia');

            $table->integer('Soluong');

            $table->string('Image');

            $table->text('Mota');

            $table->integer('ID_Thuonghieu')->unsigned()->nullable();
            $table->foreign('ID_Thuonghieu')->references('ID_Thuonghieu')->on('thuonghieu')->onDelete('cascade');

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
        Schema::dropIfExists('sanpham');
    }
}
