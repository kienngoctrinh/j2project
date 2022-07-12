<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'academic_year_id',
    ];

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function getAcademicYearNameAttribute()
    {
        return $this->belongsTo(AcademicYear::class);
    }
}
