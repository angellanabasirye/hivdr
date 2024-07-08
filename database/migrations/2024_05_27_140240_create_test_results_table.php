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
        Schema::create('test_results', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('patient_id')->nullable();
            $table->bigInteger('eligible_sample_id')->nullable();
            $table->string('test_type')->nullable(); // viral_load, drug_resistance etc
            $table->bigInteger('vl_id')->nullable();
            $table->bigInteger('vl_lab_id')->nullable();
            $table->string('vl_copies')->nullable();
            $table->bigInteger('vl_indication_id')->nullable();
            $table->string('vl_adherence')->nullable();
            $table->string('vl_test_date')->nullable();
            $table->bigInteger('dr_id')->nullable();
            $table->string('dr_lab_sample_no')->nullable();
            $table->bigInteger('dr_indication_id')->nullable();
            $table->string('rtpr_or_inti')->nullable();
            $table->string('is_amplified')->nullable();
            $table->date('dr_test_date')->nullable();
            $table->date('release_date')->nullable();
            $table->string('rt_codons')->nullable();
            $table->string('pr_codons')->nullable();
            $table->string('rt_sub_type')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_results');
    }
};
