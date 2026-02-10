<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pros', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('category');
            $table->string('subtitle')->nullable();
            $table->string('file_1')->nullable();  // First file upload
            $table->string('file_2')->nullable();  // Second file upload
            $table->string('external_link')->nullable();
            $table->string('image')->nullable();  // Image upload
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pros');
    }
};
