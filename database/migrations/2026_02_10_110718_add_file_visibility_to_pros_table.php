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
        Schema::table('pros', function (Blueprint $table) {
            $table->boolean('file_1_visible')->default(false)->after('file_1');
            $table->boolean('file_2_visible')->default(false)->after('file_2');
        });
    }

    public function down(): void
    {
        Schema::table('pros', function (Blueprint $table) {
            $table->dropColumn(['file_1_visible', 'file_2_visible']);
        });
    }
};
