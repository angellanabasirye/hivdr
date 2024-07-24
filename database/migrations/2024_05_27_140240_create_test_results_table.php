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
            $table->bigInteger('patient_id')->unsigned()->nullable();
            $table->bigInteger('eligible_sample_id')->unsigned()->nullable();
            // $table->string('test_type')->nullable(); // viral_load, drug_resistance etc
            $table->bigInteger('vl_id')->unsigned()->nullable();
            $table->bigInteger('vl_lab_id')->unsigned()->nullable();
            $table->string('vl_copies')->nullable();
            $table->bigInteger('vl_indication_id')->nullable();
            $table->string('vl_adherence')->nullable();
            $table->string('vl_test_date')->nullable();
            $table->bigInteger('dr_id')->unsigned()->nullable();
            $table->bigInteger('dr_lab_id')->unsigned()->nullable();
            $table->string('dr_lab_sample_no')->nullable();
            $table->bigInteger('dr_indication_id')->nullable();
            $table->string('rtpr_or_inti')->nullable();
            $table->string('is_amplified')->nullable();
            $table->date('dr_test_date')->nullable();
            $table->date('release_date')->nullable();
            $table->string('rt_codons')->nullable();
            $table->string('pr_codons')->nullable();
            $table->string('rt_sub_type')->nullable();
            $table->date('date_collected')->nullable();
            $table->softDeletes();

            $table->foreign('patient_id')->references('id')->on('patients')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('eligible_sample_id')->references('id')->on('eligible_samples')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dr_id')->references('id')->on('drug_resistances')
                ->onDelete('cascade')->onUpdate('cascade');

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
