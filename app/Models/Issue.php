<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Issue extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "project_id",
        "issue_no",
        "pr_no",
        "status",
        "start_date",
        "end_date",
        "summary",
        "detail",
        "developer_id",
        "reviewer_id",
        "remarks",
    ];

    const STATUS = [
        'assigned' => 1,
        'investigate' => 2,
        'in_progress' => 3,
        'completed' => 4,
        'rejected' => 5,
    ];

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
     * Get the project that owns the Issue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the developer that owns the Issue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function developer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'developer_id');
    }

    /**
     * Get the reviewer that owns the Issue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    public function getStatus(): string
    {
        $key = array_search($this->status, self::STATUS);

        return Str::title(str_replace('_', ' ', $key));
    }

    public static function getStatuses(): Collection
    {
        return collect(self::STATUS)->flip()->map(function ($value) {
            return Str::title(str_replace('_', ' ', $value));
        });
    }

    public function getGithubLink(): string
    {
        if ($this->issue_no) {
            return $this->project->github_repo . '/issues/' . ltrim($this->issue_no, '#');
        }
        if ($this->pr_no) {
            return $this->project->github_repo . '/pull/' . ltrim($this->pr_no, '#');
        }
        return '';
    }
}
