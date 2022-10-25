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
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->string('idnhanvien',10)->primary('idnhanvien');
            $table->string('idtaikhoan',10);
            $table->string('hoten',10);
            $table->string('gioitinh',10);
            $table->string('ngaysinh',10);
            $table->integer('sdt');
            $table->text('diachi',10);
            $table->string('email',10);
            $table->date('ngayvaolam',10);
            $table->double('luong');    
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
        Schema::dropIfExists('nhanvien');
    }
};
