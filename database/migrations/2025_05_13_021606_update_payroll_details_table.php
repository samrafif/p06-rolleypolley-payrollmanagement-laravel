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
        Schema::table('payrolls_details', function (Blueprint $table) {
            $table->foreignId('ran_payroll_id')->nullable()->constrained('ran_payrolls')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payrolls_details', function (Blueprint $table) {
            $table->dropColumn('ran_payroll_id');
        });
    }
};
