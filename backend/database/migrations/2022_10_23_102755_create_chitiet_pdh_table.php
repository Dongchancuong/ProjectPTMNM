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
        Schema::create('chitiet_pdh', function (Blueprint $table) {
            $table->string('idphieudh',10);
            $table->string('idsanpham',30);
            $table->integer('soluong');
            $table->integer('dongia');
            $table->foreign('idsanpham')->references('idsanpham')->on('sanpham');
            $table->foreign('idphieudh')->references('idphieudh')->on('pdh');
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
        Schema::dropIfExists('chitiet_pdh');
    }
};
