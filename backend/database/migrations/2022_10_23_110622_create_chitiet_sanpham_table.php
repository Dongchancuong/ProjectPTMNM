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
            $table->string('idsanpham',30)->primary();
            $table->string('idthuonghieu',40);
            $table->string('idmau',10);
            $table->string('idloaimay',10);
            $table->string('idchatlieu',15);
            $table->string('gioitinh',5);
            $table->string('xuatxu',100);
            $table->text('mota')->nullable();
            $table->string('anh')->nullable();
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
