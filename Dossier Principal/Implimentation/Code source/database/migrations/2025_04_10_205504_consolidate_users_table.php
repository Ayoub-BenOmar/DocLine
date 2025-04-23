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
        Schema::table('users', function (Blueprint $table) {
            // Doctor fields
            $table->string('medical_licence')->nullable();
            $table->string('medical_document')->nullable();
            $table->foreignId('speciality_id')->nullable()->constrained('speciality');
            $table->string('city')->nullable();
            $table->string('office_address')->nullable();
            $table->string('education')->nullable();
            $table->integer('fees')->nullable();
            $table->integer('experience')->nullable();
            
            // Patient fields
            $table->date('birthdate')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('blood_type')->nullable();
            $table->text('past_illnesses')->nullable();
            $table->text('surgeries')->nullable();
            $table->text('allergies')->nullable();
            $table->text('chronic')->nullable();
            
        });
        
        Schema::dropIfExists('doctors');
        Schema::dropIfExists('patients');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
