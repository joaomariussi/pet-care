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
        if (Schema::hasTable('notices_blog')) {
            Schema::table('notices_blog', function (Blueprint $table) {
                $table->timestamp('date')->after('status');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notices_blog', function (Blueprint $table) {
            $table->dropColumn('date');
        });
    }
};
