<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AITask extends Model
{
    public $table = 'a_i_tasks';

    public $fillable = [
        'task',
        'status',
        'response',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'task' => 'string',
        'status' => 'string',
        'response' => 'string'
    ];

    public static array $rules = [
        
    ];

    
}
