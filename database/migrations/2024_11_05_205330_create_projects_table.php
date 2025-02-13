<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('client_name');
            $table->string('project_name');
            $table->date('start_date');
            $table->date('deadline');
            $table->enum('project_type', ['Internal', 'External']);
            $table->enum('status', ['Incoming', 'In progress', 'On hold', 'Completed', 'Cancelled']);
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
