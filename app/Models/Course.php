<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'major_id',
        'academic_year_id',
    ];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function getMajorNameAttribute()
    {
        return $this->belongsTo(Major::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function getAcademicYearNameAttribute()
    {
        return $this->belongsTo(AcademicYear::class);
    }
}
