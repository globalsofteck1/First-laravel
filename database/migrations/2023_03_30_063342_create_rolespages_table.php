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
        Schema::create('rolespages', function (Blueprint $table) {
            $table->id();
            $table -> string('pagename', 200)->nullable();
            $table -> integer('attendantid')->nullable();
            $table -> integer('accountid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('rolespages');
    }
};
