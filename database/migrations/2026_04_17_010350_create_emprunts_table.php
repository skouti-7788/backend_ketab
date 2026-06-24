<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('emprunts', function (Blueprint $table) {
            $table->id();
            
            // 1. Zid l-column dyal l-Foreign Key f l-lowel
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('livre_id');
            // $table->string('livre');             
            $table->date('date_emprunt'); 
            $table->date('date_retour_prevue'); 
            $table->date('date_retour_effective')->nullable(); 
            
            $table->string('status')->default('active'); 
            
            // Hna l-hssab dyal l-retard derto integer bach n-stockiw 3adad l-iyam
            $table->integer('retard')->default(0); 

            // 2. Daba tqder t-dir l-Foreign Key relation
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('livre_id')
                  ->references('id')
                  ->on('livres')
                  ->onDelete('cascade');
            // Ila makhdawch timestamps f l-model, khliha haka
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('emprunts');
    }
};