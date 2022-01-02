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

    public const DEFAULT_ITEMS = [
        ['name' => 'Pending', 'color' => '#E879F9'],
        ['name' => 'Investigate', 'color' => '#0EA5E9'],
        ['name' => 'WIP', 'color' => '#6366F1'],
        ['name' => 'Review', 'color' => '#FDE047'],
        ['name' => 'Testing', 'color' => '#FB923C'],
        ['name' => 'Finished', 'color' => '#10B981'],
        ['name' => 'Rejected', 'color' => '#EF4444'],
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

        foreach (self::DEFAULT_ITEMS as $item) {
            $statuses[] = [
                'project_id' => $project->id,
                'status' => $item['name'],
                'color' => $item['color'],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        return $statuses;
    }
}
