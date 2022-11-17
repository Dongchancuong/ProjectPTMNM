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
        Schema::create('hoadon', function (Blueprint $table) {
            $table->string('idhoadon',10)->primary();
            $table->string('idkhachhang',10)->nullable();
            $table->string('idkhuyenmai',20)->nullable();
            $table->string('idnhanvien',10);
            $table->string('hoten',100)->nullable();
            $table->text('diachi')->nullable();
            $table->string('sdt')->nullable();
            $table->string('email')->nullable();
            $table->double('tonggia');
            $table->integer('soluong');
            $table->tinyInteger('visible')->default(1);
            $table->foreign('idkhachhang')->references('idkhachhang')->on('khachhang');
            $table->foreign('idkhuyenmai')->references('idkhuyenmai')->on('ctkm');
            $table->foreign('idnhanvien')->references('idnhanvien')->on('nhanvien');
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
};
