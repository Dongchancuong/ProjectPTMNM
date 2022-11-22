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
        Schema::create('giohang', function (Blueprint $table) {
            $table->id();
            $table->string('idtaikhoan',10);
            $table->string('idsanpham',30);
            $table->integer('soluong');
            $table->foreign('idtaikhoan')->references('idtaikhoan')->on('users');
            $table->foreign('idsanpham')->references('idsanpham')->on('sanpham');
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
        Schema::dropIfExists('giohang');
    }
};
