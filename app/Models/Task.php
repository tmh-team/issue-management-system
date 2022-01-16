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
        'closed_at',
    ];

    public function scopeFilter($query, array $filters = [])
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('summary', 'like', '%' . $search . '%')
                    ->orWhere('issue_no', 'like', '%' . $search . '%')
                    ->orWhere('pull_no', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['filter'] ?? false, function ($query, $filter) {
            $query->when($filter['category'] ?? false, function ($query, $category) {
                $query->whereHas('category', function ($query) use ($category) {
                    $query->where('id', $category);
                });
            })
                ->when($filter['project'] ?? false, function ($query, $project) {
                    $query->whereHas('project', function ($query) use ($project) {
                        $query->where('project_id', $project);
                    });
                })
                ->when($filter['status'] ?? false, function ($query, $status) {
                    $query->whereHas('status', function ($query) use ($status) {
                        $query->where('id', $status);
                    });
                })
                ->when($filter['from_start_date'] ?? false, function ($query, $fromDate) {
                    $query->whereDate('start_date', '>=', $fromDate);
                })
                ->when($filter['to_start_date'] ?? false, function ($query, $toDate) {
                    $query->whereDate('start_date', '<=', $toDate);
                });
        });
    }

    /**
     * Scope a query to only include not finish
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotFinish($query)
    {
        if (request('filter')) {
            return $query;
        }

        return $query->where(function ($query) {
            $query->whereNull('end_date')
                ->orWhereDate('end_date', '>=', now());
        });
    }

    public function scopeSort($query)
    {
        $query->orderBy('id', 'desc');
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
        return $this->developers()
            ->get()
            ->map(fn($developer) => "<a href='{$developer->path()}'>{$developer->name}</a>")
            ->join(', ');
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
        return $this->reviewers()
            ->get()
            ->map(fn($reviewer) => "<a href='{$reviewer->path()}'>{$reviewer->name}</a>")
            ->join(', ');
    }
}
