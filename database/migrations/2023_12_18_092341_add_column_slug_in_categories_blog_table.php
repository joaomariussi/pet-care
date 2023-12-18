<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('categories_blog')) {
            Schema::table('categories_blog', function (Blueprint $table) {
                $table->string('slug')->after('name_category');
            });
        }

        // Atualiza os registros que já existem
        $categories = DB::table('categories_blog')->get();

        foreach ($categories as $category) {
            DB::table('categories_blog')
                ->where('id', $category->id)
                ->update([
                    'slug' => Str::slug($category->name_category)
                ]);
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories_blog', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
