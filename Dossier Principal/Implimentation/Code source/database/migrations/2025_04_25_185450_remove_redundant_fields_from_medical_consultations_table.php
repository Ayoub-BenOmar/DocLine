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
        Schema::table('medical_consultations', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
            $table->dropForeign(['patient_id']);
            $table->dropForeign(['treatment_id']);
            $table->dropColumn(['doctor_id', 'patient_id', 'treatment_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medical_consultations', function (Blueprint $table) {
            $table->foreignId('doctor_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('patient_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('treatment_id')->constrained('treatments')->onDelete('cascade');
        });
    }
};
