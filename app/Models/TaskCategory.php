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

    public const NAMES = [
        'Feature',
        'Bug',
        'Feedback',
    ];

    public static function getDefaultCategories(Project $project): array
    {
        $names = [];
        $now = now()->toDateTimeLocalString();

        foreach (self::NAMES as $name) {
            $names[] = [
                'project_id' => $project->id,
                'name' => $name,
                'color' => '#D8DBE0',
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        return $names;
    }
}
