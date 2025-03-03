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
        Schema::create('items_categories', function (Blueprint $table) {
            $table->foreignId('items_id')->constrained('items')->onDelete('cascade');
            $table->foreignId('categories_id')->constrained('categories')->onDelete('cascade');
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_categories');
    }
};
