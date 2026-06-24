<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('image')->nullable(); // مسار صورة الغلاف
            $table->string('category');
            $table->year('annee'); // سنة النشر
            $table->integer('pages');
            $table->string('fileSize'); // حجم الملف (مثلاً: 2MB)
            $table->string('extension'); // نوع الملف (pdf, epub, etc.)
            $table->date('creationDate');
            $table->decimal('book_rank',2,1)->default(0.0); // تقييم الكتاب
            $table->decimal('prix', 8, 2); // السعر
// التغيير من boolean إلى integer
            $table->integer('showLiver')->default(0);  
            $table->integer('qte')->default(1); // الكمية
            // $table->boolean('disponibilite')->default(true); // متاح أم لا
            $table->integer('status')->default(1); // الحالة (جديد، مستعمل، إلخ)
            $table->string('pdf_url')->nullable(); 
            $table->integer('is_free')->nullable();
            $table->string('download_link')->nullable();
            $table->timestamps();
            
            // تم حذف $table->timestamps() لأنك حددت false في الموديل
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};