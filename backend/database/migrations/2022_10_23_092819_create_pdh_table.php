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
            $table->string('idkhuyenmai',10);
            $table->string('hoten',100);
            $table->integer('sdt');
            $table->string('email',100);
            $table->text('diachi');
            $table->double('tonggia');
            $table->date('ngaylap');
            $table->boolean('tinhtrang');
            $table->primary('idphieudh');
            $table->foreign('idkhuyenmai')->references('idkhuyenmai')->on('ctkm');
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
