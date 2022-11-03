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
        Schema::create('khachhang', function (Blueprint $table) {
            $table->string('idkhachhang',10);
            $table->string('idtaikhoan',10);
            $table->string('hoten',100);
            $table->integer('sdt');
            $table->text('diachi');
            $table->string('email');
            $table->bigInteger('doanhso');
            $table->integer('capdo');
            $table->primary('idkhachhang');
            $table->foreign('idtaikhoan')->references('idtaikhoan')->on('taikhoan');
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
        Schema::dropIfExists('khachhang');
    }
};
