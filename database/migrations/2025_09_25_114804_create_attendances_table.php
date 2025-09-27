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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->date('date');
            $table->time('inTime')->nullable();
            $table->decimal('inTimeLatitude', 10, 7)->nullable();
            $table->decimal('inTimeLongitude', 10, 7)->nullable();
            $table->time('outTime')->nullable();
            $table->decimal('outTimeLatitude', 10, 7)->nullable();
            $table->decimal('outTimeLongitude', 10, 7)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
