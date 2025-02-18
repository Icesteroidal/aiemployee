<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AIEmployee extends Model
{
    public $table = 'a_i_employees';

    public $fillable = [
        'name',
        'role',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'name' => 'string',
        'role' => 'string',
        'status' => 'string'
    ];

    public static array $rules = [
        
    ];

    public function predefinedTasks()
    {
        $tasks = [
            'VA' => ['Check Emails', 'Send Follow-ups'],
            'CommunityManager' => ['Monitor Discord', 'Reply to Messages'],
            'Scheduler' => ['Schedule Meetings', 'Check Calendar']
        ];
        return $tasks[$this->role] ?? [];
    }

    
}
