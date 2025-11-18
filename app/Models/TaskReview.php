<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskReview extends Model
{
    protected $fillable = [
        'submission_id',
        'score',
        'feedback',
        'test_results',
    ];

    protected $casts = [
        'test_results' => 'array',
    ];

    public function submission(): BelongsTo
    {
        return $this->belongsTo(TaskSubmission::class);
    }
}