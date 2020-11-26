<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableChitiethdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiet_hd', function (Blueprint $table) {
            $table->increments('ID_Chitiethd');

            $table->integer('ID_Sanpham')->unsigned()->nullable();
            $table->foreign('ID_Sanpham')->references('ID_Sanpham')->on('sanpham')->onDelete('cascade');

            $table->integer('Soluongmua');

            $table->integer('Gia');

            $table->integer('ID_Hoadon')->unsigned()->nullable();
            $table->foreign('ID_Hoadon')->references('ID_Hoadon')->on('hoadon')->onDelete('cascade');

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
        Schema::dropIfExists('chitiet_hd');
    }
}
