<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    use HasFactory;

     protected $fillable = [

            'workspace_name',
            'workspace_description',
            'access_token',
            'createdby_id',
            'createdby_name',
            'created_at'

        ];


}
