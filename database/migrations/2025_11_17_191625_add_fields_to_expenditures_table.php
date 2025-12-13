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
        Schema::table('expenditures', function (Blueprint $table) {
            // Check if columns exist before adding them
            if (!Schema::hasColumn('expenditures', 'employee_id')) {
                $table->foreignId('employee_id')->nullable()->constrained('employees')->onDelete('set null')->after('id');
            }
            
            if (!Schema::hasColumn('expenditures', 'amount')) {
                $table->decimal('amount', 10, 2)->after('employee_id');
            }
            
            if (!Schema::hasColumn('expenditures', 'description')) {
                $table->text('description')->after('amount');
            }
            
            if (!Schema::hasColumn('expenditures', 'date')) {
                $table->date('date')->after('description');
            }
            
            if (!Schema::hasColumn('expenditures', 'category')) {
                $table->string('category')->after('date'); // utilities, supplies, maintenance, etc.
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expenditures', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
            $table->dropColumn(['employee_id', 'amount', 'description', 'date', 'category']);
        });
    }
};