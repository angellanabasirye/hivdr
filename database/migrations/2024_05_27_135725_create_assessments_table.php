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
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->date('assessment_date');
            $table->bigInteger('vl_id')->unsigned()->nullable();
            $table->string('pss_issues')->nullable();
            $table->string('stable')->nullable();
            $table->string('hasAHD')->nullable();
            $table->string('CD4')->nullable();
            $table->date('CD4_date')->nullable();
            $table->string('crag')->nullable();
            $table->date('crag_date')->nullable();
            $table->string('tbLam')->nullable();
            $table->string('tbLam_date')->nullable();
            $table->string('weight_kgs')->nullable();
            $table->string('MUAC')->nullable();
            $table->date('Weight_MUAC_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
