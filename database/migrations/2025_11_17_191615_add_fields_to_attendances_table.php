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
        Schema::table('attendances', function (Blueprint $table) {
            // Check if columns exist before adding them
            if (!Schema::hasColumn('attendances', 'date')) {
                $table->date('date')->after('student_id');
            }
            
            if (!Schema::hasColumn('attendances', 'status')) {
                $table->string('status')->after('date');
            }
            
            if (!Schema::hasColumn('attendances', 'remarks')) {
                $table->text('remarks')->nullable()->after('status');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropColumn(['date', 'status', 'remarks']);
        });
    }
};