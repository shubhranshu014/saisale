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
        Schema::create('proforma_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lead_id');
            $table->foreign('lead_id')
                ->references('id')
                ->on('leads')
                ->onDelete('cascade');
            $table->decimal('total');
            $table->longText('items');
            $table->enum('discount_type',['flat','percentage'])->nullable();
            $table->decimal('discount')->default(0);
            $table->enum('status', [
                'draft',
                'sent',
                'accepted',
                'rejected',
                'cancelled',
                'unpaid',
                'partially_paid',
                'paid',
                'overdue',
                'refunded'
            ])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proforma_invoices');
    }
};
