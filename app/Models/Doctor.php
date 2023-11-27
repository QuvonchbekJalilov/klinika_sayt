<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        "first_name",
        "last_name",
        "desease_id",
        "image",
        "email",
        "description",
    ];

    public function desease()
    {
        return $this->belongsTo(Desease::class, "desease_id");
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function appointment(){
        return $this->hasOne(Appointment::class);
    }
}
