<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    public const DEFAULT_ITEMS = [
        ['name' => 'Feature', 'color' => '#10B981'],
        ['name' => 'Bug', 'color' => '#EF4444'],
        ['name' => 'Feedback', 'color' => '#60A5FA'],
    ];

    public function scopeFilter($query)
    {
        $query->when(request('search'), function ($query) {
            $query->where('name', 'like', '%' . request('search') . '%');
        });
    }

    public function scopeSort($query)
    {
        $query->orderBy('id', 'desc');
    }

    public static function getDefaultCategories(Project $project): array
    {
        $names = [];
        $now = now()->toDateTimeLocalString();

        foreach (self::DEFAULT_ITEMS as $item) {
            $names[] = [
                'project_id' => $project->id,
                'name' => $item['name'],
                'color' => $item['color'],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        return $names;
    }
}
