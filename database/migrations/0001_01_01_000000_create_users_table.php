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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('name');
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->unsignedBigInteger('user_id')->nullable(); // field to track who created the user
            $table->enum('role', ['superadmin', 'admin', 'user'])->default('user'); // role column
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Reference to users table
            $table->string('email'); // Email of the user requesting the reset
            $table->string('token', 191)->unique();// Unique token
            $table->timestamp('created_at')->nullable(); // When the token was created
            $table->timestamp('expires_at')->nullable(); // When the token expires
            $table->string('status')->default('pending'); // Status of the token
        });


        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->length(191)->primary();
            $table->foreignId('user_id')->nullable()->index(); // This remains the same
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index(); // Indexing last_activity for performance
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
