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
            $table->string('idsanpham');
            $table->string('idthuonghieu');
            $table->string('idmau');
            $table->string('idloaimay');
            $table->string('idchatlieu');
            $table->boolean('gioitinh');
            $table->string('xuatxu');
            $table->text('mota');
            $table->string('anh');
            $table->boolean('tinhtrang');
            $table->foreign('idsanpham')->references('idsanpham')->on('sanpham');
            $table->foreign('idthuonghieu')->references('idkhuyenmai')->on('ctkm');
            $table->foreign('idmau')->references('idkhuyenmai')->on('ctkm');
            $table->foreign('idloaimay')->references('idkhuyenmai')->on('ctkm');
            $table->foreign('idchatlieu')->references('idkhuyenmai')->on('ctkm');
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
