<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'number_lesson',
        'subject_id',
        'classs_id',
        'teacher_id',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function getSubjectNameAttribute()
    {
        return $this->belongsTo(Subject::class);
    }

    public function classs()
    {
        return $this->belongsTo(Classs::class);
    }

    public function getClasssNameAttribute()
    {
        return $this->belongsTo(Classs::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function getTeacherNameAttribute()
    {
        return $this->belongsTo(Teacher::class);
    }
}
