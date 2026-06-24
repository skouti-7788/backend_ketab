<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id(); // المعرف الأساسي
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            
            // بما أنك وضعت timestamps = false في الموديل
            // فلا داعي لإضافة $table->timestamps() هنا
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};