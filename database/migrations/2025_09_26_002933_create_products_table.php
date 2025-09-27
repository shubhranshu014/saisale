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
             // Foreign Keys
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('product_id'); // This is the product code FK

            // Product Details
            $table->decimal('length_rmt', 8, 2)->default(5.85);
            $table->integer('quantity_pcs')->default(0);
            $table->decimal('quantity_rmt', 8, 2)->default(0);
            $table->string('no_bundles')->nullable();
            $table->decimal('in_kg', 8, 3)->default(0);
            $table->decimal('purchase_price', 10, 2)->default(0);
            $table->decimal('gst', 5, 2)->default(0);
            $table->string('hsn_code')->nullable();
            $table->decimal('selling_price', 10, 2)->default(0);
            $table->decimal('total_price', 12, 2)->default(0);
            $table->integer('low_stock')->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('productcodes')->onDelete('cascade');

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
