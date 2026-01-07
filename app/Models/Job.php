<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

     protected $fillable = [
        'company_id',
        'category_id',
        'title',
        'description',
        'location',
        'salary',
        'job_type',
        'status',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class); // job belongs to company , which company posted this job
    }

    public function category()
    {
        return $this->belongsTo(Category::class); // job belongs to spefic category
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class); // Many-to-many / job has many skills 
    }

    public function applications()
    {
        return $this->hasMany(Application::class); // one job have many application
    }
}
