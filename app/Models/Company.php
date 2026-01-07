<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'logo',
        'description',
        'website',
    ];


    public function user()
    {
        return $this->belongsTo(User::class); // Belongs to an employer
    }

    public function jobs()
    {
        return $this->hasMany(Job::class); // Company has many jobs
    }
}
