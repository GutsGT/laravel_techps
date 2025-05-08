<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('union_agreements', function (Blueprint $table){
            $table->id();

            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('creater_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('updater_id')->constrained('users')->cascadeOnDelete();

            $table->string('name');
            $table->json('week_hours');
            $table->double('overtime_bonus_min')->min(0)->max(1);
            $table->double('overtime_bonus_max')->min(0)->max(1);
            $table->integer('overtime_limit');
            $table->integer('tolerance');
            $table->date('start_date');
            $table->date('end_date');
            $table->double('breakfast_value');
            $table->double('lunch_value');
            $table->double('dinner_value');
            $table->time('previous_balance');
            $table->integer('duration');
            $table->string('details');
            
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('union_agreements');
    }
};
