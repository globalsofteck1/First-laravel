<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table -> id();
            $table -> string('username', 255)->nullable();
            $table -> string('usertype', 255)->nullable();
            $table -> string('regdate', 255)->nullable();
            $table -> integer('authstatus')->nullable();
            $table -> integer('attendantid')->nullable();
            $table -> integer('accountid')->nullable();
            $table -> string('password', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
