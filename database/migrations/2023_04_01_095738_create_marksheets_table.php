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
        Schema::create('marksheets', function (Blueprint $table) {
            $table->id();
            $table->integer('subjectid')->nullable();
            $table->integer('userid')->nullable();
            $table->integer('chapterid')->nullable();
            $table->integer('marks')->nullable();
            $table->integer('score')->nullable();
            $table->string('desc', 50)->nullable();
            $table->string('comp', 255)->nullable();
            $table->string('skills', 255)->nullable();
            $table->string('remarks', 255)->nullable();
            $table->string('initials', 5)->nullable();
            $table->integer('accountid')->nullable();
            $table->integer('attendantid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('marksheets');
    }
};
