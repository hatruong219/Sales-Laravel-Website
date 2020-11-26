<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBinhluanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binhluan', function (Blueprint $table) {
            
            $table->increments('ID_Bl');

            $table->integer('ID_User')->unsigned()->nullable();
            $table->foreign('ID_User')->references('ID_User')->on('khachhang')->onDelete('cascade');

            $table->integer('ID_Sanpham')->unsigned()->nullable();
            $table->foreign('ID_Sanpham')->references('ID_Sanpham')->on('sanpham')->onDelete('cascade');

            $table->integer('Capbac');

            $table->text('Noidung');

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
        Schema::dropIfExists('binhluan');
    }
}
