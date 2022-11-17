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
        Schema::create('chitiet_pnh', function (Blueprint $table) {
            $table->string('idpnh',10);
            $table->string('idsanpham',30);
            $table->integer('soluong');
            $table->primary(['idpnh','idsanpham']);
            $table->foreign('idpnh')->references('idpnh')->on('pnh');
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
        Schema::dropIfExists('chitiet_pnh');
    }
};
