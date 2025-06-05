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
        Schema::create('diagnoses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->text('clinical_examination')->nullable();
            $table->text('abdominal_examination')->nullable();
            $table->text('abdominal_ultrasound')->nullable();
            $table->text('laboratory_tests')->nullable();
            $table->text('upper_endoscopy')->nullable();
            $table->text('lower_endoscopy')->nullable();
            $table->text('diagnosis')->nullable();
            $table->text('follow_up')->nullable();
            $table->text('ercp')->nullable();
            $table->text('chief_complaint')->nullable();
            $table->text('medical_history')->nullable();
            $table->text('further_investigations')->nullable();
            $table->text('treatment')->nullable();
            $table->text('notes')->nullable();
            $table->string('sat')->nullable();
            $table->string('rr')->nullable();
            $table->string('hr')->nullable();
            $table->string('bp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnoses');
    }
};
