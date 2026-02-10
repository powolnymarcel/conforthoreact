<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        // database/migrations/xxxx_xx_xx_create_slides_table.php
        public function up()
        {
            Schema::create('slides', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('category');
                $table->text('short_description');
                $table->string('image');
                $table->timestamps();
            });
        }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slides');
    }
};
