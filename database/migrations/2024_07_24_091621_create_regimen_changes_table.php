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
        Schema::create('regimen_changes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('patient_id')->unsigned();
            $table->bigInteger('patient_regimen_id')->unsigned();
            $table->bigInteger('from_regimen')->unsigned()->nullable();
            $table->bigInteger('to_regimen')->unsigned()->nullable();
            $table->string('reasons')->nullable();
            $table->text('comment')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regimen_changes');
    }
};
