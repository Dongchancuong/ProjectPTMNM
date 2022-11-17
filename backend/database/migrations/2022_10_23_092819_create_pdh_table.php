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
        Schema::create('pdh', function (Blueprint $table) {
            $table->string('idphieudh',10);
            $table->string('idkhuyenmai',20)->nullable();
            $table->string('idnhanvien',10)->nullable();
            $table->string('hoten',50);
            $table->string('sdt',12);
            $table->string('email',40);
            $table->text('diachi');
            $table->integer('tonggia');
            $table->boolean('tinhtrang');
            $table->primary('idphieudh');
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
        Schema::dropIfExists('pdh');
    }
};
