<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classs extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'major_id',
        'course_id',
    ];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function getMajorNameAttribute()
    {
        return $this->belongsTo(Major::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getCourseNameAttribute()
    {
        return $this->belongsTo(Course::class);
    }
}
