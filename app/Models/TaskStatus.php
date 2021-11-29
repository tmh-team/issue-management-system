<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['project_id', 'status'];

    public const STATUSES = [
        'Pending',
        'Investigate',
        'WIP',
        'Review',
        'Testing',
        'Finished',
        'Rejected',
    ];

    /**
     * The project that belongs to the task status
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public static function getDefaultStatuses(Project $project): array
    {
        $statuses = [];
        $now = now()->toDateTimeLocalString();

        foreach (self::STATUSES as $status) {
            $statuses[] = [
                'project_id' => $project->id,
                'status' => $status,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        return $statuses;
    }
}
