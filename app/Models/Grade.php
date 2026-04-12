<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'user_id',
        'grade_level',
        'subject_code',
        'subject_name',
        'q1_grade',
        'q2_grade',
        'q3_grade',
        'q4_grade',
        'final_grade',
        'remarks',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
