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
            $table->char('product_id');
            $table->string('product_name');
            $table->enum('category', ['S', 'D', 'A']);
            $table->string('product_code');
            $table->integer('price');
            $table->string('unit');
            $table->integer('stock');
            $table->string('description');
            $table->string('image');
            $table->primary('product_id');
            $table->timestamps();
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
