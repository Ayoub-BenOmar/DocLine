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
        Schema::create('medical_consultations', function (Blueprint $table) {
            $table->id();
            $table->string('raison_consultation');
            $table->integer('weight');
            $table->integer('bpm');
            $table->integer('blood_pressure');
            $table->integer('blood_sugar');
            $table->text('current_diagnosis');
            $table->text('symptoms');
            $table->text('doctor_note');
            $table->date('date');
            $table->foreignId('appointment_id')->constrained('appointments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_consultations');
    }
};
