<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 100)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('careof', 100)->nullable();
            $table->string('contact', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('userid', 100)->nullable();
            $table->string('class', 100)->nullable();
            $table->biginteger('payments')->nullable();
            $table->string('initials', 50)->nullable();
            $table->string('photo', 100)->nullable();
            $table->string('sign', 100)->nullable();
            $table->integer('authstatus')->nullable();
            $table->integer('accountid')->nullable();
            $table->integer('attendantid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
