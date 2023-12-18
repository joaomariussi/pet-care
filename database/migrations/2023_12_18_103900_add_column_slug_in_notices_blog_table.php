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
        if (Schema::hasTable('notices_blog')) {
            Schema::table('notices_blog', function (Blueprint $table) {
                $table->string('slug')->after('title');
            });
        }

        $notices = DB::table('notices_blog')->get();

        foreach ($notices as $notice) {
            DB::table('notices_blog')
                ->where('id', $notice->id)
                ->update([
                    'slug' => Str::slug($notice->title)
                ]);
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notices_blog', function (Blueprint $table) {
            //
        });
    }
};
