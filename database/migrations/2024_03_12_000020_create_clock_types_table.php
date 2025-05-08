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
        Schema::create('clock_types', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->integer('internal_code');
            $table->integer('external_code');

            $table->boolean('active')->default(true);
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clock_types');
    }
};
