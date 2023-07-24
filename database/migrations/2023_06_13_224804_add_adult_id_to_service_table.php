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
        Schema::table('services', function (Blueprint $table) {
            $table->unsignedTinyInteger('adult_id')->after('field_id');
            $table->foreign('adult_id')->references('adult_id')->on('adults');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service', function (Blueprint $table) {
            $table->dropColumn('adult_id');
        });
    }
};
