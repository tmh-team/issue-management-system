<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeFilter($query)
    {
        $query->when(request('search'), function ($query) {
            $query->where('name', 'like', '%' . request('search') . '%');
        })
            ->when(request('project_id'), function ($query) {
                $query->whereHas('projects', function ($query) {
                    $query->where('projects.id', request('project_id'));
                });
            });
    }

    public function scopeSort($query)
    {
        $query->orderBy('id', 'desc');
    }

    /**
     * Set the password
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = bcrypt($value);
    }

    /**
     * The projects that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }

    public function projectsToString()
    {
        return $this->projects()
            ->get()
            ->map(fn($project) => "<a href='{$project->path()}'>{$project->name}</a>")
            ->join(', ');
    }

    /**
     * The developingTasks that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function developingTasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'task_developers', 'user_id', 'task_id');
    }

    public function path()
    {
        return route('users.show', $this->id);
    }

    /**
     * The profile has one to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
