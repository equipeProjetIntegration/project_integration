<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('etudiant', function ($table) {
            $table->id();
            $table->string('nom',20);
            $table->string('prenom',20);
            $table->string('email');
            $table->string('mdp');
            $table->enum('typeStage',['initiation','perfectionnement','PFE']);
            $table->string('domaineEtude');
            $table->string('specialite');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('etudiant');
    }
};
