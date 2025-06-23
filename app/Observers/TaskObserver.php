<?php

namespace App\Observers;

use App\Models\Task;
use App\Models\TaskLog;

class TaskObserver
{
    /**
     * Handle the Task "created" event.
     */
    public function created(Task $task): void
    {
        // Log the creation of the task
        TaskLog::create([
            'task_id' => $task->id,
            'old_status' => $task->status, // No old status as it's a new task
            'new_status' => $task->status, // The initial status of the new task
            'changed_by' => auth()->id(), // The user who created it
        ]);
    }

    public function updating(Task $task)
    {
        if ($task->isDirty('status')) {
            \App\Models\TaskLog::create([
                'task_id' => $task->id,
                'old_status' => $task->getOriginal('status'),
                'new_status' => $task->status,
                'changed_by' => auth()->id(),
            ]);
        }
    }
    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        //
    }
}
