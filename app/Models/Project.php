<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'summary'];

    public function scopeFilter($query,array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search){
            $query->where('name', 'like', '%' . $search . '%');
        });
        
        $query->when($filters['filters'] ?? false, function($query, $filters) {
            $query->when($filters['user_id'] ?? false, function($query, $userId) {
                $query->whereHas('users', function($query) use ($userId) {
                    $query->where('users.id', $userId);
                });
            });
        });
    }

    public function scopeSort($query)
    {
        $query->orderBy('id', 'desc');
    }

    /**
     * The users that belong to the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * The status that has many to the Project
     */
    public function statuses()
    {
        return $this->hasMany(TaskStatus::class);
    }

    public function path()
    {
        return route('projects.show', $this->id);
    }
}
