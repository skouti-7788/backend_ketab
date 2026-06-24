<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('acheter', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            // $table->unsignedBigInteger('adherent_id')->nullable();
            $table->unsignedBigInteger('livre_id')->nullable();
            // $table->decimal('prix', 8, 2)->default(0.00);
            // $table->integer('quantite')->default(1);
            $table->date('date_achat');
            $table->string('status')->nullable();
            $table->string('status_paye')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('acheter');
    }
};
