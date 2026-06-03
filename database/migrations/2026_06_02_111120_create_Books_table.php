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
        Schema::create('Books', function (Blueprint $table) {
    $table->id();
    $table->foreignId('library_id') // الكتاب يتبع مكتبة
          ->constrained('libraries')
          ->onDelete('cascade');
          
    $table->string('title');
    $table->string('author');
    $table->boolean('is_available')->default(true);
    $table->string('avatar')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
