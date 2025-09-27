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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id')->index(); // FK to employee_details
            $table->date('period_start');
            $table->date('period_end');
            $table->decimal('basic', 12, 2)->default(0);
            $table->decimal('TA', 12, 2)->default(0);
            $table->decimal('DA', 12, 2)->default(0);
            $table->decimal('allowances', 12, 2)->default(0); // other allowances (medical, conveyance etc)
            $table->decimal('net_pay', 12, 2)->default(0);
            $table->string('leaves');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employee_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
