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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('StockId')->references('id')->on('stocks');
            $table->foreignId('ShipmentId')->references('id')->on('shipments');
            $table->string('CustomerName');
            $table->string('Estimation');
            $table->integer('Quantity');
            $table->integer('TotalPrice');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
