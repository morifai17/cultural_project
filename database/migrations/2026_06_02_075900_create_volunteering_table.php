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
        Schema::create('volunteerings', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade'); // المتطوع
    $table->foreignId('cultural_center_id')->constrained()->onDelete('cascade'); // المركز
    $table->foreignId('activity_id')->nullable()->constrained()->onDelete('cascade'); // مرتبط بنشاط؟
    
    $table->string('status')->default('pending'); // حالة الطلب (pending, accepted, rejected)
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteering');
    }
};
