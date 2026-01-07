<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_id',
        'resume',
        'cover_letter',
        'status',
    ];

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship to Job
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
