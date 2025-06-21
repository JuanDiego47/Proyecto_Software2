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
        Schema::create('project_metrics', function (Blueprint $table) {
            $table->id(); // Or you can omit this for composite keys
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade'); // Important for data integrity
            $table->foreignId('sustainability_metric_id')->constrained('sustainability_metrics')->onDelete('cascade'); // Important
            $table->decimal('metric_value')->nullable();
            $table->date('date_measured')->nullable();
            $table->timestamps(); // Optional
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
