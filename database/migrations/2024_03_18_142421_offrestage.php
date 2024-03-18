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
        Schema::create('offrestage', function ($table) {
            $table->id();
            $table->integer('idEntreprise'); // foreign
            $table->enum('status',['disponible','non disponible']); // modif to apply later
            $table->string('titre');
            $table->string('description',255);
            $table->string('domaine');
            $table->string('localisation');
            $table->date('dateLimite');
            $table->enum('typeStage',['remunere','nonRemunere']); // modif to apply later
            $table->string('cahierCharge'); // file path?
            // linking the foreign key
            $table->foreign('idEntreprise')->references('id')->on('entreprise')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('offrestage');
    }
};
