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
        Schema::create('users', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->string('email')->unique();
          $table->string('password');
          $table->rememberToken();
          $table->unsignedBigInteger('department_id')->nullable();
          $table->unsignedBigInteger('sub_department_id')->nullable();
          $table->foreign('sub_department_id')->references('id')->on('sub_departments')->onDelete('cascade');
          $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
