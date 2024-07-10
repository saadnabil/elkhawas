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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable();
            $table->json('item_name')->nullable();
            $table->json('description')->nullable();
            $table->json('unit')->nullable();
            $table->integer('units_number')->nullable();
            $table->double('unit_price')->nullable();
            $table->double('total_price')->nullable();
            $table->integer('quantity')->default(0)->nullable();
            $table->integer('max_order_quantity')->default(0)->nullable();
            $table->text('barcode')->nullable();
            $table->text('barcodeimage')->nullable();
            $table->string('image')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
