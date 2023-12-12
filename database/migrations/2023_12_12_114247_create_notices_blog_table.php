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
        Schema::create('notices_blog', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories_blog')->cascadeOnDelete();
            $table->string('title', 100);
            $table->string('subtitle', 150);
            $table->longText('content');
            $table->longText('avatar');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
