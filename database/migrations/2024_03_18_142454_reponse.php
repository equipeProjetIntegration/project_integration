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
        Schema::create('reponse', function ($table) {
            $table->id();
            $table->integer('idQues'); // foreign
            $table->integer('idAdmin'); // foreign
            $table->string('contenu',255);
            $table->date('date');
            // linking the foreign keys
            $table->foreign('idQues')->references('id')->on('question')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idAdmin')->references('id')->on('admin')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('reponse');
    }
};
