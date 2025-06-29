<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'company',
        'location',
        'type',
        'description',
        'user_id',
    ];

    /**
     * Get the user that owns the job.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
