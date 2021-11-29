<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

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
        'task_category_id',
        'start_date',
        'end_date',
        'remarks',
        'closed',
    ];

    public function scopeFilter($query)
    {
        $query->when(request('search'), function ($query) {
            $query->where('summary', 'like', '%' . request('search') . '%')
                ->orWhere('issue_no', 'like', '%' . request('search') . '%')
                ->orWhere('pull_no', 'like', '%' . request('search') . '%');
        });
    }

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
     * Get the task statuses that own the Status
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(TaskStatus::class, 'task_status_id');
    }

    /**
     * Get the category statuses that own the Status
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(TaskCategory::class, 'task_category_id');
    }

    /**
     * Get the developers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function developers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'task_developers', 'task_id', 'user_id');
    }

    public function developersToString()
    {
        return $this->developers()->pluck('name')->join(', ');
    }

    /**
     * Get the reviewers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reviewers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'task_reviewers', 'task_id', 'user_id');
    }

    public function reviewersToString()
    {
        return $this->reviewers()->pluck('name')->join(', ');
    }
}
