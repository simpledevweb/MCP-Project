<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TaskSubmission extends Model
{
    protected $fillable = [
        'task_id',
        'student_id',
        'code',
        'status',
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function review(): HasOne
    {
        return $this->hasOne(TaskReview::class, 'submission_id');
    }
}