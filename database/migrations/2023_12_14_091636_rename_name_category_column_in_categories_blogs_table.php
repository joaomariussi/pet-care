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
        if (!Schema::hasColumn('categories_blog', 'name_category')) {
            Schema::table('categories_blog', function (Blueprint $table) {
                $table->string('name_category')->after('id')->unique();
            });
        }

        if (Schema::hasColumn('categories_blog', 'name-category')) {
            Schema::table('categories_blog', function (Blueprint $table) {
                $table->dropColumn('name-category');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
