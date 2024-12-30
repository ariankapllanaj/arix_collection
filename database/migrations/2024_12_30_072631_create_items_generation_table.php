<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('items_generation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('items_id')->constrained('items')->onDelete('cascade');
            $table->foreignId('generation_id')->constrained('generations')->onDelete('cascade');
            $table->timestamps();
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_generation');
    }
};
