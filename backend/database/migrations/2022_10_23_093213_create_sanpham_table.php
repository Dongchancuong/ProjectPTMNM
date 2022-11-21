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
        Schema::create('sanpham', function (Blueprint $table) {
            $table->string('idsanpham',30);
            $table->string('idkhuyenmai',20)->nullable();
            $table->string('idnhacungcap',10);
            $table->string('tensanpham',100);
            $table->integer('soluong'); 
            $table->integer('dongia');
            $table->tinyInteger('visible')->default(1);
            $table->primary('idsanpham');
            $table->foreign('idkhuyenmai')->references('idkhuyenmai')->on('ctkm');
            $table->foreign('idnhacungcap')->references('idnhacungcap')->on('nhacungcap');
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
};
