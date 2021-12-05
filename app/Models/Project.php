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
