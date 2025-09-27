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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->enum('payment_mode', ['Cash', 'Bank', 'UPI', 'Cheque']);
            $table->foreignId('bank_id')->nullable()->constrained('banks')->onDelete('set null');
            $table->string('upi_id')->nullable();
            $table->string('cheque_no')->nullable();
            $table->string('cheque_bank_name')->nullable();
            $table->string('receipt_no')->nullable();
            $table->string('description')->nullable();
            $table->date('payment_date')->default(DB::raw('CURRENT_DATE'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
