<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('entreprise', function ($table) {
            $table->id();
            $table->string('nom');
            $table->string('email');
            $table->string('mdp');
            $table->string('sectActivite');
            $table->string('infoSupp',255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('entreprise');
    }
};
