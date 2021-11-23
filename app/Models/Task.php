<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'project_id',
        'issue_no',
        'pull_no',
        'summary',
        'detail',
        'task_status_id',
        'start_date',
        'end_date',
        'remarks',
    ];

    /**
     * Get the project that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the developers that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function developers(): HasMany
    {
        return $this->hasMany(TaskDeveloper::class, 'task_id');
    }

    /**
     * Get the reviewers that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviewers(): HasMany
    {
        return $this->hasMany(TaskReviewer::class, 'task_id');
    }
}
