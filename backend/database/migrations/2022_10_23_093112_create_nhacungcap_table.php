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
        Schema::create('nhacungcap', function (Blueprint $table) {            
            $table->string('idnhacungcap',20);
            $table->string('tennhacungcap',100);
            $table->text('diachi');
            $table->string('email',30);
            $table->string('sdt',12);
            $table->tinyInteger('visible')->default(1);
            $table->primary('idnhacungcap');
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
        Schema::dropIfExists('nhacungcap');
    }
};
