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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->string('title');
            $table->string('level1');
            $table->string('level2');
            $table->string('level3');
            $table->decimal('price', 8,2);
            $table->decimal('priceSP', 8,2);
            $table->integer('quantity');
            $table->text('fields');
            $table->tinyInteger('featured')->default(null);
            $table->string('unit', 32);
            $table->string('img');
            $table->tinyInteger('main');
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
