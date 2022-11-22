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
            $table->increments('STT')->start_from(0);
            $table->string('idnhanvien',10);
            $table->string('idtaikhoan',10)->nullable();
            $table->string('hoten',50);
            $table->string('gioitinh',10);
            $table->date('ngaysinh',10);
            $table->string('sdt',12);
            $table->text('diachi',10);
            $table->string('email',40);
            $table->date('ngayvaolam',10);
            $table->double('luong');  
            $table->tinyInteger('visible')->default(1);  
            /* create an index for the autoincrement column */
            $table->unique('STT');  
            /* drop the primary key */
            $table->dropPrimary(); 
            /* add new primary key */
            $table->primary(['idnhanvien', 'STT']);
            $table->foreign('idtaikhoan')->references('idtaikhoan')->on('users');
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
