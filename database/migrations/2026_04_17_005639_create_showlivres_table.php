<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('showlivres', function (Blueprint $table) {
            $table->id();
            
            // ربط المعرفات الخارجية
            // تأكد أن جدول 'user' وجدول 'livres' تم إنشاؤهما قبل هذا الجدول
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('livre_id')->constrained('livres')->onDelete('cascade');
            
            // بما أنك وضعت timestamps = false في الموديل، لا نضيف $table->timestamps()
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('showlivres');
    }
};