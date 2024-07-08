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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('art_number')->nullable();
            $table->bigInteger('facility_id')->unsigned();
            $table->date('birthdate')->nullable();
            $table->string('gender')->nullable();
            $table->date('art_start_date')->nullable();
            $table->string('status')->nullable();
            $table->boolean('is_backlog')->default(0);
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->softDeletes();

            $table->foreign('created_by')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
