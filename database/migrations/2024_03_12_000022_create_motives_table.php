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
        Schema::create('motives', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('creater_id')->constrained('users')->cascadeOnDelete();
            
            $table->string('name');
            $table->string('subtitle');
            
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motives');
    }
};
