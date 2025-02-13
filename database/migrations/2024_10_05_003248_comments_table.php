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
            Schema::create('comments', function (Blueprint $table) {
                $table->id(); // Auto-incrementing ID
                $table->unsignedBigInteger('task_id'); // Foreign key referencing tasks table
                $table->text('comment'); // Text of the comment
                $table->string('file_name')->nullable(); // Name of the attached file (if any)
                $table->string('file_url')->nullable(); // URL of the attached file (if any)
                $table->timestamps(); // Created at and updated at timestamps
                // Foreign key constraint
                $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');

            });
        }

        public function down()
        {
            Schema::dropIfExists('comments');
        }
    

};
