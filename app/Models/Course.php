<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // protected $table = 'students';
    protected $fillable = [
        'nom',
        'syallbus',
        'duration',
    ];
    use HasFactory;
    public function duration()
    {
        return $this->duration."month";
    }

}
