<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('task_title'); // Name of the task
            $table->string('workspace_id'); // Workspace the task belongs to
            $table->string('assigned_to'); // User id assigned to the task
            $table->string('assignedto_name'); // User name assigned to the task
            $table->decimal('budget_allocated', 8, 2)->nullable(); // Budget allocated
            $table->enum('current_status', ['backlog', 'inprogress', 'revision', 'done']); // Status of the task
            $table->unsignedBigInteger('created_by'); // ID of the user who created the task
            $table->timestamps(); // Created at and updated at timestamps

            // Foreign key constraint (assuming you have a users table)
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
