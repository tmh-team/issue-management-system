<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class TaskStatus extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['project_id', 'status'];

    const STATUS = [
        'meeting' => 1,
        'investigate' => 2,
        'develop' => 3,
        'testing' => 4,
        'review' => 5,
        'review_fix' => 6,
        'bug_fix' => 7,
        'customer_feedback_fix' => 8,
        'finished' => 9,
        'rejected' => 10,
        'pending' => 11,
    ];

    /**
     * The project that belongs to the task status
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public static function getStatuses(): Collection
    {
        return collect(self::STATUS)->flip()->map(function ($value) {
            return Str::title(str_replace('_', ' ', $value));
        });
    }
}
