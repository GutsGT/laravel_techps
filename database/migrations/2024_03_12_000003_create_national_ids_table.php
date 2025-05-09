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
        Schema::create('national_ids', function(Blueprint $table){
            $table->id();

            $table->foreignId('state_id')->constrained()->cascadeOnDelete();
            
            $table->string('id_code');
            $table->string('issuing_body');
            $table->date('issue_date');
            
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('national_ids');
    }
};
