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
        Schema::create('sustainability_metrics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('sustainability_categories'); // Foreign key constraint
            $table->string('metric_name');
            $table->string('unit_of_measure')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
