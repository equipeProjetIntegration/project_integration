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
        Schema::create('notificationEntreprise', function ($table) {
            $table->id();
            $table->integer('identreprise'); // foreign
            // linking the foreign key
            $table->foreign('identreprise')->references('id')->on('entreprise')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('notificationEntreprise');
    }
};
