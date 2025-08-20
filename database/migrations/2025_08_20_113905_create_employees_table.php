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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->default('India');
            
            // Employment Details
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('position_id');
            $table->date('join_date');
            $table->date('contract_end_date')->nullable();
            $table->enum('employment_status', ['active', 'inactive', 'terminated', 'resigned'])->default('active');
            
            // Salary Information
            $table->decimal('basic_salary', 10, 2);
            $table->decimal('house_rent_allowance', 10, 2)->default(0);
            $table->decimal('dearness_allowance', 10, 2)->default(0);
            $table->decimal('transport_allowance', 10, 2)->default(0);
            $table->decimal('medical_allowance', 10, 2)->default(0);
            $table->decimal('other_allowances', 10, 2)->default(0);
            
            // Bank Details
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('ifsc_code')->nullable();
            
            // Emergency Contact
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('emergency_contact_relationship')->nullable();
            
            // Documents
            $table->string('profile_photo')->nullable();
            $table->string('id_proof')->nullable();
            $table->string('resume')->nullable();
            
            $table->text('notes')->nullable();
            $table->timestamps();
            
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('restrict');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
