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
        //Tạo bảng phiếu đặt hàng
        Schema::create('ctkm', function (Blueprint $table) {
            $table->string('idkhuyenmai',20);
            $table->string('tenchuongtrinh',40);
            $table->integer('giamgia');
            $table->date('ngaybatdau');
            $table->date('ngayketthuc');
            $table->tinyInteger('visible')->default(1);
            $table->primary('idkhuyenmai');
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
        Schema::dropIfExists('ctkm');
    }
};
