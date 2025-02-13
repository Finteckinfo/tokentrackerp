<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timesheets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User who submitted the timesheet
            $table->string('employee_name'); // The employee name
            $table->string('task_id'); // Task ID
            $table->string('project')->nullable(); // Project the task is related to
            $table->integer('approximated_hours'); // Approximated hours for task completion
            $table->integer('submitted_hours'); // Submitted hours by the employee
            $table->boolean('approved')->default(false); // Whether the timesheet is approved or not
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid'); // Paid or unpaid status
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timesheets');
    }
}
