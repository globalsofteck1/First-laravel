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
        Schema::create('rolespermissions', function (Blueprint $table) {
            $table->id();
            $table -> integer('roleid')->nullable();
            $table -> integer('pageid')->nullable();
            $table -> integer('accesstatus')->nullable();
            $table -> integer('createstatus')->nullable();
            $table -> integer('deletestatus')->nullable();
            $table -> integer('editstatus')->nullable();
            $table -> integer('viewstatus')->nullable();
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
        Schema::dropIfExists('rolespermissions');
    }
};
