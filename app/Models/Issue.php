<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Issue extends Model
{
    use HasFactory;

    const STATUS = [
        'investigate' => 1,
        'in_progress' => 2,
        'completed' => 3,
        'rejected' => 4,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function getStatus()
    {
        $key = array_search($this->status, self::STATUS);

        return Str::title(str_replace('_', ' ', $key));
    }
}
