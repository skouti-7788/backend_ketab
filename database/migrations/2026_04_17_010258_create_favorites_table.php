<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            
            // ربط المعرفات الخارجية
            // نستخدم 'user' و 'livres' بناءً على أسماء الجداول التي أنشأتها سابقاً
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('livre_id')->constrained('livres')->onDelete('cascade');
            
            // منع تكرار نفس الكتاب في مفضلة نفس المستخدم مرتين
            $table->unique(['user_id', 'livre_id']);
            
            $table->timestamps(); // الموديل الخاص بك لا يعطل الـ timestamps لذا سنتركها
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};