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
        Schema::create('candidature', function ($table) {
            $table->id();
            $table->integer('idEtudiant'); // foreign
            $table->integer('idOffre'); // foreign
            $table->date('dateSoumission');
            $table->enum('status',['enAttend','acceptee','refusee']);
            $table->string('cv'); // file path?
            // linking the foreign keys
            $table->foreign('idEtudiant')->references('id')->on('etudiant')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idOffre')->references('id')->on('offrestage')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('candidature');
    }
};
