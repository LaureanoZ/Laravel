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
        Schema::create('services_has_designs', function (Blueprint $table) {
            $table->foreignId('service_id')->constrained('services', 'service_id');
            $table->unsignedTinyInteger('design_id');
            $table->foreign('design_id')->references('design_id')->on('designs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_has_designs');
    }
};
