<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->date('evaluation_date');
            $table->integer('rating'); // Skala 1-100
            $table->text('feedback');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('performances');
    }
};