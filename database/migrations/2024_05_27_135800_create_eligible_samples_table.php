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
        Schema::create('eligible_samples', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('facility_id');
            $table->bigInteger('patient_id');
            $table->string('vl_source')->nullable();
            $table->string('eligible_sample_no')->nullable();
            $table->string('locator_no')->nullable();
            $table->string('sample_type')->nullable();
            $table->date('vl_test_date')->nullable();
            $table->string('who_status')->nullable();
            $table->boolean('dr_requested')->nullable();
            $table->date('date_collected')->nullable();
            $table->date('date_received')->nullable();
            $table->date('approval_date')->nullable();
            $table->date('results_upload_date')->nullable();
            $table->bigInteger('assigned_dr_lab')->nullable();
            $table->bigInteger('batch_id')->nullable();
            $table->bigInteger('test_result_id')->nullable();
            $table->string('form_number')->nullable();
            $table->string('status')->nullable(); // deferred, awaiting referral, referred, pending, rejected
            $table->date('deferred_at')->nullable();
            $table->dateTime('referred_to_dr_at')->nullable();
            $table->boolean('accepted_at_dr')->nullable();
            $table->string('dr_rejection_reason')->nullable();
            $table->string('dr_defer_reason')->nullable();
            $table->date('new_sample_collection_date')->nullable();
            $table->bigInteger('referred_by')->nullable();
            $table->bigInteger('deferred_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eligible_samples');
    }
};
