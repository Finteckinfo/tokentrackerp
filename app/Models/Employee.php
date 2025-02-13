<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'profile_picture',
        'full_name',
        'email',
        'country',
        'designation',
        'department',
        'gender',
        'work_anniversary',
        'date_of_birth',
        'supervisor',
        'about',
        'employment_type',
        'passport_id'
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'employee_project');
    }

}
