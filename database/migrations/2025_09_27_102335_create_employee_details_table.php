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
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('fullName');
            $table->string('email');
            $table->string('hiring_position');
            $table->date('dob');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('contact_no');
            $table->text('address');
            $table->decimal('current_pay', 10, 2);
            $table->text('assets')->nullable();
            $table->date('date_of_joining');

            $table->string('photo')->nullable();
            $table->string('adhar_card')->nullable();
            $table->string('cv')->nullable();

            // Bank details
            $table->string('bank_account_no');
            $table->string('ifsc_code');
            $table->string('bank_name');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_details');
    }
};
