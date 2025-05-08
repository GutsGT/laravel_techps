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
        if(!Schema::hasTable('users')){
            Schema::create('users', function(Blueprint $table){
                $table->id();

                $table->foreignId('access_level_id')->constrained()->cascadeOnDelete();
                $table->foreignId('city_id')->constrained()->cascadeOnDelete();
                $table->foreignId('creater_id')->nullable()->constrained('users')->cascadeOnDelete();
                $table->foreignId('updater_id')->nullable()->constrained('users')->cascadeOnDelete();

                $table->string('name');
                $table->string('login')->unique();
                $table->string('password');
                $table->string('email');
                $table->datetime('email_verified_at')->nullable();
                $table->string('profile_photo_path')->nullable();
                
                $table->boolean('active')->default(true);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
