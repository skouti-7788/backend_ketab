<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // اسم المستخدم في ذلك الوقت
            $table->string('email'); 
            $table->string('livre'); // اسم الكتاب (للتوثيق التاريخي)
            $table->integer('rate')->nullable(); // التقييم الممنوح
            // $table->boolean('favorie')->default(false); // هل كان في المفضلة؟

            // ربط المعرفات الخارجية (Foreign Keys)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('livre_id')->constrained('livres')->onDelete('cascade');

            // بما أنك وضعت timestamps = false في الموديل
            // قد ترغب في إضافة عمود واحد فقط للتاريخ لمعرفة متى تم هذا الإجراء
            $table->timestamp('action_date')->useCurrent(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('history');
    }
};