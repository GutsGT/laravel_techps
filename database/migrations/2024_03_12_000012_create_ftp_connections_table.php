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
        Schema::create('ftp_connections', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            
            $table->string('server_address');
            $table->string('username');
            $table->string('userpass');
            
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ftp_connections');
    }
};
