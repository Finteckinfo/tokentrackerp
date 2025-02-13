<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->unsignedBigInteger('from'); // ID of the sender
            $table->timestamp('time')->nullable(); // Time of the notification
            $table->unsignedBigInteger('to_userid'); // ID of the recipient
            $table->string('title'); // Notification title
            $table->text('message'); // Notification message
            $table->decimal('budget_allocated', 10, 2)->nullable(); // Budget allocated (nullable)
            $table->unsignedBigInteger('task_id')->nullable(); // Task ID associated with the notification (nullable)
            $table->unsignedBigInteger('workspace_id')->nullable(); // Workspace ID associated with the notification (nullable)
            $table->text('links')->nullable(); // Links related to the notification (nullable)
            $table->boolean('is_read')->default(false); // Notification read status (default: false)
            $table->timestamps(); // Automatically adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
