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
        Schema::create('menu_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_category_id')->references('id')->on('menu_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('menu_name');
            $table->enum('type', ['Food', 'Drink']);
            $table->string('image')->nullable();
            $table->decimal('price');
            $table->integer('stock');
            $table->decimal('tax');
            $table->string('nama');
            $table->enum('status', ['create', 'edit', 'restock']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_histories');
    }
};
