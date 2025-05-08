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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
            $table->foreignId('creater_id')->constrained('users')->cascadeOnDelete();            
            $table->foreignId('updater_id')->constrained('users')->cascadeOnDelete();
            //A coluna standard_ua_id será criada após a criação da tabela unionAgreements
            $table->foreignId('head_office_id')->constrained('companies')->cascadeOnDelete();
            
            $table->string('name');
            $table->string('email');
            $table->string('nrle');
            $table->date('nrle_register_date');
            $table->string('fantasy_name');
            $table->string('state_reg');
            $table->string('city_reg');
            $table->string('tax_regime');
            $table->string('logo_file_path')->nullable();
            $table->string('domain_name');

            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
