<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->unique();
            $table->string('profile_picture')->nullable();
            $table->string('full_name');
            $table->string('designation');
            $table->string('department');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->date('work_anniversary');
            $table->date('date_of_birth');
            $table->string('supervisor')->nullable();
            $table->string('email')->unique();  // Add email field
            $table->string('country');           // Add country field
            $table->text('about')->nullable();
            $table->string('employment_type');
            $table->string('passport_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
