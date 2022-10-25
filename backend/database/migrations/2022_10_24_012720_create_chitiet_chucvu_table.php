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
            $table->string('idchucvu',10)->primary();
            $table->string('idchucnang',10);
            $table->foreign('idchucnang')->references('idchucnang')->on('chucnang');
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
