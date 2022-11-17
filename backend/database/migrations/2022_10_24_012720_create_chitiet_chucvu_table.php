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
        Schema::create('chitiet_chucvu', function (Blueprint $table) {
            $table->string('idchucvu',10);
            $table->string('idchucnang',10);
            $table->tinyInteger('visible')->default(1);
            $table->primary(['idchucvu','idchucnang']);
            $table->foreign('idchucnang')->references('idchucnang')->on('chucnang');
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
        Schema::dropIfExists('chitiet_chucvu');
    }
};
