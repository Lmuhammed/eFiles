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
        Schema::create('department_file', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_id')->constrained('files')->onDelete('cascade');
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
            $table->unique(['file_id', 'department_id'], 'unique_file_department');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files_departments');
    }
};
