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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('level')->nullable();
            $table->string('dhis2_name')->nullable();
            $table->string('dhis2_code')->nullable();
            $table->bigInteger('district_id')->unsigned()->nullable();
            $table->bigInteger('hub_id')->unsigned()->nullable();
            $table->bigInteger('implementing_partner_id')->unsigned()->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->softDeletes();

            $table->foreign('district_id')->references('id')->on('districts')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('hub_id')->references('id')->on('hubs')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('implementing_partner_id')->references('id')->on('implementing_partners')
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
        Schema::dropIfExists('facilities');
    }
};
