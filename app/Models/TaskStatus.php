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
    protected $fillable = ['project_id', 'status', 'color'];

    public const STATUSES = [
        'Pending',
        'Investigate',
        'WIP',
        'Review',
        'Testing',
        'Finished',
        'Rejected',
    ];

    public function scopeFilter($query)
    {
        $query->when(request('search'), function ($query) {
            $query->where('status', 'like', '%' . request('search') . '%');
        });
    }

    public function scopeSort($query)
    {
        $query->orderBy('id', 'desc');
    }

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
                'color' => '#' . dechex(rand(0x000000, 0xFFFFFF)),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        return $statuses;
    }
}
