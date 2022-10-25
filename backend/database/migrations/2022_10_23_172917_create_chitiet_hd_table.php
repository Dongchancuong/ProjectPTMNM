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
        Schema::create('chitiet_hd', function (Blueprint $table) {
            $table->string('idhoadon',10)->primary();
            $table->string('idsanpham',10);
            $table->integer('soluong');
            $table->double('dongia');
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
        Schema::dropIfExists('chitiet_hd');
    }
};
