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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('idtaikhoan',10);
            $table->string('idchucvu',10);
            $table->string('username');
            $table->string('password');
            $table->string('email')->unique()->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable();
            /* create an index for the autoincrement column */
            $table->unique('id');  
            /* drop the primary key */
            $table->dropPrimary(); 
            /* add new primary key */
            $table->primary(['idtaikhoan']);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
