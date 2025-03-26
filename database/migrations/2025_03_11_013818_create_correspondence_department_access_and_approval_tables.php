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
        Schema::create('correspondence_department_access', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->foreignId('correspondence_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            //unique constraint on the combination of department_id and file_id
            $table->unique(['correspondence_id','department_id'],'corr_dep_unique');
        });

        Schema::create('correspondence_department_approval', function (Blueprint $table) {
            $table->id();
            // status will be added later
            $table->enum('status', ['Accepté', 'Refusé', 'Autre']);
            $table->string('message')->nullable();
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->foreignId('correspondence_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_file_approval');
        Schema::dropIfExists('department_file_access');
    }
};
