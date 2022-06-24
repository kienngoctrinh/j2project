<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'major_id',
    ];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function getMajorNameAttribute()
    {
        return $this->belongsTo(Major::class);
    }
}
