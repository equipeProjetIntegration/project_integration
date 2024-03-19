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
        Schema::create('question', function ($table) {
            $table->id();
            $table->unsignedBigInteger('idEtudiant'); // foreign
            $table->string('contenu',255);
            $table->date('date');
            $table->enum('status',['enAttend','envoyee']);
            // linking the foreign key
            $table->foreign('idEtudiant')->references('id')->on('etudiant')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question');
    }
};
