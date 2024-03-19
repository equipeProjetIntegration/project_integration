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
        Schema::create('notificationEtudiant', function ($table) {
            $table->id();
            $table->unsignedBigInteger('idetudiant'); // foreign
            // linking the foreign key
            $table->foreign('idetudiant')->references('id')->on('etudiant')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificationEtudiant');
    }
};
