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
        Schema::create('taikhoan', function (Blueprint $table) {
            $table->string('idtaikhoan',10);
            $table->string('idchucvu',10);
            $table->string('tentaikhoan',100);
            $table->string('matkhau',100);
            $table->primary('idtaikhoan');
            $table->foreign('idchucvu')->references('idchucvu')->on('chucvu');
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
        Schema::dropIfExists('taikhoan');
    }
};
