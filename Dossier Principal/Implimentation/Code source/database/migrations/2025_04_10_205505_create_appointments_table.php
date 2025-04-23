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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('users');
            $table->foreignId('doctor_id')->constrained('users');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->enum('visit_type', ['new-patient', 'follow-up', 'annual-checkup', 'urgent']);
            $table->string('insurance_provider')->nullable();
            $table->text('medical_documents')->nullable(); // Will store JSON of document paths
            $table->enum('status', ['scheduled', 'rescheduled', 'completed'])->default('scheduled');
            $table->date('rescheduled_date')->nullable();
            $table->time('rescheduled_time')->nullable();
            $table->text('reschedule_reason')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
}; 