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
            $table->increments('STT')->start_from(0);
            $table->string('idkhachhang',10);
            $table->string('idtaikhoan',10)->nullable();
            $table->string('hoten',50);
            $table->string('sdt',12);
            $table->text('diachi');
            $table->string('email',40);
            $table->bigInteger('tichluy');
            $table->integer('capdo')->default(1);
            $table->tinyInteger('visible')->default(1);
            /* create an index for the autoincrement column */
            $table->unique('STT');  
            /* drop the primary key */
            $table->dropPrimary(); 
            /* add new primary key */
            $table->primary(['idkhachhang', 'STT']);
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
        Schema::dropIfExists('khachhang');
    }
};
