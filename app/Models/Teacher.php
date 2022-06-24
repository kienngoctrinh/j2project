<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
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
        'major_id',
    ];

    public function getGenderNameAttribute()
    {
        return ($this->gender === 0) ? 'Female' : 'Male';
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function getMajorNameAttribute()
    {
        return $this->belongsTo(Major::class);
    }
}
