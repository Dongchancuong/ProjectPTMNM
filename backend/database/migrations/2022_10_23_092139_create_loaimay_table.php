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
        Schema::create('loaimay', function (Blueprint $table) {
            $table->string('idloaimay',10);
            $table->string('tenloaimay',100);
            $table->tinyInteger('visible')->default(1);
            $table->primary('idloaimay');
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
        Schema::dropIfExists('loaimay');
    }
};
