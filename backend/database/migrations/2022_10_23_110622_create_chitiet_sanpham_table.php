<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiet_sanpham', function (Blueprint $table) {
            $table->string('idsanpham',10)->primary();
            $table->string('idthuonghieu',10);
            $table->string('idmau',10);
            $table->string('idloaimay',10);
            $table->string('idchatlieu',10);
            $table->boolean('gioitinh');
            $table->string('xuatxu',100);
            $table->text('mota');
            $table->string('anh');
            $table->boolean('tinhtrang');
            $table->foreign('idsanpham')->references('idsanpham')->on('sanpham');
            $table->foreign('idthuonghieu')->references('idthuonghieu')->on('thuonghieu');
            $table->foreign('idmau')->references('idmau')->on('mausac');
            $table->foreign('idloaimay')->references('idloaimay')->on('loaimay');
            $table->foreign('idchatlieu')->references('idchatlieu')->on('chatlieu');
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
        Schema::dropIfExists('chitiet_sanpham');
    }
};
