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
        Schema::create('tickets', function (Blueprint $table) {
          $table->id();
          $table->string('reporter_name');
          $table->string('location');
          $table->string('mobile_no');
          $table->string('priority');
          $table->string('problem');
          $table->string('status')->default('pending');
          $table->unsignedBigInteger('user_id')->nullable();
          $table->unsignedBigInteger('department_id')->nullable();
          $table->unsignedBigInteger('sub_department_id')->nullable();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
          $table->foreign('sub_department_id')->references('id')->on('sub_departments')->onDelete('cascade');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      //  Schema::dropIfExists('tickets');
        Schema::table('tickets', function (Blueprint $table) {
       $table->dropColumn('status');
   });
    }
};
