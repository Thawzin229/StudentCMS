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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('roll_no');
            $table->string('class');
            $table->string('dob');
            $table->string('nrc');
            $table->string('father_name');
            $table->string('address');
            $table->string('role')->default('student');
            $table->string('ph')->nullable();
            $table->string('ph2')->nullable();
            $table->string('ph3')->nullable();
            $table->text('jwt_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
