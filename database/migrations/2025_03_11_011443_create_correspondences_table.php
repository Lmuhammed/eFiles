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
        Schema::create('correspondences', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('source');
            $table->string('destination');
            $table->string('object');
            $table->enum('status', ['Informational', 'Urgent', 'Routine'])->default('Informational');
            $table->enum('type', ['Letter', 'Invoice', 'Report','Recommendation'])->default('Letter');
            $table->date('date');
            $table->string('note')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('correspondences');
    }
};
