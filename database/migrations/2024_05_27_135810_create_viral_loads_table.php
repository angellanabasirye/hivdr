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
        Schema::create('viral_loads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('eligible_sample_id')->unsigned()->nullable();
            $table->bigInteger('patient_id')->unsigned()->nullable();
            $table->bigInteger('test_result_id')->unsigned()->nullable();
            $table->bigInteger('vl_lab_id')->unsigned()->nullable();
            $table->string('vl_source')->nullable();
            $table->string('vl_copies')->nullable();
            $table->date('vl_test_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viral_loads');
    }
};
