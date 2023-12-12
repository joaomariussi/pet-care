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
        if (Schema::hasTable('sectors')) {
            Schema::table('sectors', function (Blueprint $table) {
                $table->string('email_sector', 191)->unique()->after('status');
                $table->boolean('available')->default(true)->after('email_sector');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sectors', function (Blueprint $table) {
            $table->dropColumn('email_sector');
            $table->dropColumn('available');
        });
    }
};
