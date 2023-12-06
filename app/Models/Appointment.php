<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'email',
        'mobile',
        'doctor_id',
        'month',
        'time',
        'description',
        'status',
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
}
