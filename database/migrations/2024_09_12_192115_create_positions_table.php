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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('description', 255)->nullable();
            $table->decimal('salary', 10, 2);
            $table->enum('experience_with_animals', ['Iniciante', 'Moderado', 'Avançado', 'Especialista']);
            $table->text('additional_skills')->nullable();
            $table->integer('weekly_workload')->default(40);
            $table->string('work_area')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
