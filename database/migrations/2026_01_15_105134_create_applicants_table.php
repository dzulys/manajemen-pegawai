<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('position_applied');
            $table->string('resume_path')->nullable(); // Untuk simpan file CV
            $table->enum('status', ['pending', 'interview', 'accepted', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};