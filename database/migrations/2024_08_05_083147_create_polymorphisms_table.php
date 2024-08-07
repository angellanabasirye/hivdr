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
        Schema::create('polymorphisms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('drug_resistance_id')->unsigned();
            $table->string('classification');
            $table->text('polymorphism');
            $table->integer('mutations_greater_than_20')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polymorphisms');
    }
};
