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
        Schema::create('resistances', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('drug_resistance_id')->unsigned();
            $table->string('drug_type');
            $table->string('drug_code');
            $table->string('drug_name');
            $table->string('resistance_level');
            $table->float('scoring')->nullable();
            $table->string('mutations_at_greater_than_20')->nullable();
            $table->string('mutations_at_less_than_20')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resistances');
    }
};
