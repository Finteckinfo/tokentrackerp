<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'client_id',
        'client_name',
        'start_date',
        'deadline',
        'status',
        'project_type',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_project');
    }

}
