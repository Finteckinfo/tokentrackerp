<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_title',
        'workspace_id',
        'assigned_to',
        'assignedto_name',
        'budget_allocated',
        'current_status',
        'created_by',
    ];

    public function subtasks() // Use plural for naming convention
    {
        return $this->hasMany(Subtask::class); // Correct usage
    }

    public function workspace()
    {
        return $this->belongsTo(Workspace::class); // Correct relationship
    }
}
