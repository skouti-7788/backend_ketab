<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('telecharger', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            // $table->unsignedBigInteger('adherent_id')->nullable();
            $table->unsignedBigInteger('livre_id')->nullable();
            // $table->string('fichier')->nullable();
            // $table->string('format')->nullable();
            $table->date('date_telechargement');
            // $table->integer('download_count')->default(1);
            $table->string('status')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('telecharger');
    }
};
