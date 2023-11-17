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
        Schema::create('sales', function (Blueprint $table) {
            $table->char('id');
            $table->string('code')->unique();
            $table->date('trx_date');
            $table->integer('sub_amount');
            $table->integer('amount_total');
            $table->integer('discount_amount');
            $table->integer('total_products');
            $table->foreignId('customer_id')->contarained('customer')->onDelete('cascade');
            $table->string('description');
            $table->primary('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
