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
        Schema::create('subtasks', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->unsignedBigInteger('task_id'); // Foreign key referencing tasks table
            $table->string('subtask_title')->nullable();// Name of the subtask
            $table->boolean('completed')->default(false); // Status of the subtask (completed or not)
            $table->timestamps(); // Created at and updated at timestamps

            // Foreign key constraint
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('subtasks');
    }
};
