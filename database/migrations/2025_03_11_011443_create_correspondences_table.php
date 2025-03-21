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
            /* other type to be added 
            Follow-Up Message - رسالة متابعة
            Reminder Message - رسالة تذكير
            Feedback Request - طلب ملاحظات
            Inquiry Message - رسالة استفسار
            Invitation - دعوة
             */
            $table->enum('type', ['Letter', 'Invoice', 'Report','Recommendation'])->default('Letter');
           /*  other type to be added 
            Memo - مذكرة
            Notice - إشعار
            Circular - تعميم
            Agenda - جدول أعمال
            Minutes - محضر اجتماع
            Proposal - اقتراح
             */
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
