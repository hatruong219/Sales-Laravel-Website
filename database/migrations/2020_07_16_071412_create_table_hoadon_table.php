<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHoadonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadon', function (Blueprint $table) {
            
            $table->increments('ID_Hoadon');

            $table->date('Ngaymua');

            $table->integer('ID_User')->unsigned()->nullable();
            $table->foreign('ID_User')->references('ID_User')->on('khachhang')->onDelete('cascade');
            $table->integer('Tongtien');
            $table->string('Trangthai');
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
        Schema::dropIfExists('hoadon');
    }
}
