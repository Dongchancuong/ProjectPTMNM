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
        Schema::create('chatlieu', function (Blueprint $table) {
            $table->string('idchatlieu',15);
            $table->string('tenchatlieu',100);
            $table->tinyInteger('visible')->default(1);
            $table->primary('idchatlieu');
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
        Schema::dropIfExists('chatlieu');
    }
};
