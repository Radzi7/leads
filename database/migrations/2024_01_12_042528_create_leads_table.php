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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status');
            $table->string('number');
            $table->text('comment')->nullable();
            $table->foreignId('lead_column_id')->constrained('lead_columns');
            $table->unsignedBigInteger('operator_id')->nullable();
            $table->foreign('operator_id')->references('id')->on('operators');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
