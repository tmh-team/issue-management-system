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
    
    /**
     * The project that belongs to the task status
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
