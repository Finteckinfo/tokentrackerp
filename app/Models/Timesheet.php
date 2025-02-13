<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'employee_name',
        'task_id',
        'project',
        'approximated_hours',
        'submitted_hours',
        'approved',
        'status',
    ];

    // Relationship: Each timesheet belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
