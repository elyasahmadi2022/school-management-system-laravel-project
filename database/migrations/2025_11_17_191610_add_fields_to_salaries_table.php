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
        Schema::table('salaries', function (Blueprint $table) {
            if (!Schema::hasColumn('salaries', 'payment_date')) {
                $table->date('payment_date')->after('amount');
            }
            
            if (!Schema::hasColumn('salaries', 'month')) {
                $table->string('month')->after('payment_date');
            }
            
            if (!Schema::hasColumn('salaries', 'year')) {
                $table->string('year')->after('month');
            }
            
            if (!Schema::hasColumn('salaries', 'status')) {
                $table->string('status')->default('paid')->after('year'); // paid, pending, overdue
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('salaries', function (Blueprint $table) {
            $table->dropColumn(['payment_date', 'month', 'year', 'status']);
        });
    }
};