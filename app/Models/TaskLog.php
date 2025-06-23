<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskLog extends Model
{
    protected $fillable = [
        'task_id',
        'changed_by',
        'old_status',
        'new_status',
    ];
}
