<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blacklistes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emprunt_id');
            $table->unsignedBigInteger('adherent_id');
            $table->enum('status', ['Bloqué', 'Levé'])->default('Bloqué'); // FIX: décommenté
            $table->timestamps();

            $table->foreign('emprunt_id')->references('id')->on('emprunts')->onDelete('cascade');
            $table->foreign('adherent_id')->references('id')->on('adherents')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blacklistes');
    }
};