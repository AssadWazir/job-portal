<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;




    public function user()
    {
        return $this->belongsTo(User::class); // Application belong to User  , which user submitted application
    }

    public function job()
    {
        return $this->belongsTo(Job::class); // application is submitted for job , means which job
    }

    
}
