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
        Schema::create('drug_resistances', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dr_lab_id')->unsigned()->nullable();
            $table->bigInteger('vl_id')->unsigned()->nullable();
            $table->bigInteger('patient_id')->unsigned()->nullable();
            $table->bigInteger('test_result_id')->unsigned()->nullable();
            $table->string('suggested_by_clinician')->nullable();
            $table->string('suggestion_date')->nullable();
            $table->string('suggested_regimen')->nullable();
            $table->text('suggested_comment')->nullable();
            $table->string('suggested_regimen_change_reason')->nullable();
            $table->string('suggested_score')->nullable();
            $table->string('decision')->nullable();
            $table->date('decision_date')->nullable();
            $table->string('reviewer_level')->nullable();
            $table->bigInteger('reviewer_id')->unsigned()->nullable();
            $table->string('assigned_regimen_at_decision')->nullable();
            $table->string('art_no_after_regimen_start')->nullable();
            $table->text('decision_comment')->nullable();
            $table->string('regimen_change_reasons')->nullable();
            $table->boolean('facility_notified_no_switch')->nullable();
            $table->softDeletes();

            $table->foreign('patient_id')->references('id')->on('patients')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('reviewer_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_resistances');
    }
};
