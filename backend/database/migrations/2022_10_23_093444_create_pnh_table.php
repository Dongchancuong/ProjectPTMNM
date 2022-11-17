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
        Schema::create('pnh', function (Blueprint $table) {
            $table->string('idpnh',10);
            $table->string('idnhanvien',10);
            $table->string('idnhacungcap',20);
            $table->primary('idpnh');
            $table->foreign('idnhanvien')->references('idnhanvien')->on('nhanvien');
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
        Schema::dropIfExists('pnh');
    }
};
