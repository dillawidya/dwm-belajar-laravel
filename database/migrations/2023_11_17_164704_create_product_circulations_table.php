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
        Schema::create('product_circulations', function (Blueprint $table) {
            $table->char('id');
            $table->date('trx_date');
            $table->string('reff');
            $table->integer('in');
            $table->integer('out');
            $table->string('product_id');
            $table->string('remaining_stock');
            $table->primary('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_circulations');
    }
};
