<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $table = 'enrollments';
    protected $primaryKey = 'id';
    protected $fillable = [
        'enroll_no',
        'promotion_id',
        'join_date',
        'fee',
        'student_id'
    ];

    use HasFactory;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function promotion()
    {
        return $this->belongsTo(promotion::class);
    }
}
