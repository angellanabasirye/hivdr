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
        Schema::create('d_r_comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('drug_resistance_id');
            $table->string('comment_type');
            $table->string('drug_type');
            $table->text('comment');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_r_comments');
    }
};
