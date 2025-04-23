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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();                           // Primary key (id)
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('shift_clock_in_time');
            $table->integer('shift_duration');
            
            // Foreign key to departments
            $table->foreignId('department_id')->constrained()->cascadeOnDelete();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
