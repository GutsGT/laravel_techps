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
        Schema::create('driver_licenses', function(Blueprint $table){
            $table->id();

            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            
            $table->string('code');
            $table->char('type', 2);
            $table->date('register_date');
            $table->date('expire_date');
            $table->date('first_license_date');
            $table->date('issue_date');
            $table->string('details')->nullable();
            $table->boolean('is_wage_earning');
            
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_licenses');
    }
};
