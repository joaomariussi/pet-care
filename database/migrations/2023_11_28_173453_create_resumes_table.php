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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('registered_jobs')->onDelete('cascade');
            $table->string('name', 60);
            $table->string('email', 60);
            $table->string('phone', 60);
            $table->string('birth_date', 60);
            $table->string('city', 60);
            $table->string('state', 60);
            $table->text('file_pdf');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
