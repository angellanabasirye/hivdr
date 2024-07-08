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
        Schema::create('implementing_partners', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('asp_id')->unsigned()->nullable();
            $table->string('name');
            $table->softDeletes();

            $table->foreign('asp_id')->references('id')->on('asp')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('implementing_partners');
    }
};
