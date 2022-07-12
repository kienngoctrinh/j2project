<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'gender',
        'birthdate',
        'address',
        'phone',
        'email',
        'course_id',
    ];

    public function getGenderNameAttribute()
    {
        return ($this->gender === 0) ? 'Nữ' : 'Nam';
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
