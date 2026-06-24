<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('adherents', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // الاسم الكامل للمشترك
            $table->string('email')->unique(); // البريد الإلكتروني (فريد)
            $table->string('phone'); // رقم الهاتف
            $table->date('datadahestion'); // تاريخ الانضمام (صححت الخطأ الإملائي من الموديل)
            $table->string('status')->default('active'); // حالة الاشتراك (نشط، موقوف، إلخ)
            $table->string('livre')->nullable(); // الكتاب المستعار حالياً (أو ملاحظة عنه)
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');

            // بما أنك وضعت timestamps = false في الموديل
            // لن يتم إضافة أعمدة created_at و updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('adherents');
    }
};