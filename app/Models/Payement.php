<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payement extends Model
{
    protected $table = 'payements';
    protected $primaryKey = 'id';
    protected $fillable = [
        'enrollment_id',
        'paid_date',
        'amount',
        
    ];

    use HasFactory;

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function promotion()
    {
        return $this->belongsTo(promotion::class);
    }
}
