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
        Schema::create('hubs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('implementing_partner_id')->unsigned()->nullable();
            $table->bigInteger('region_id')->unsigned()->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->softDeletes();

            $table->foreign('implementing_partner_id')->references('id')->on('implementing_partners')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('region_id')->references('id')->on('regions')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('hubs');
    }
};
