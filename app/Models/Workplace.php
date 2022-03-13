<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Workplace extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
    ];

    public function leader(){
        return $this->belongsTo(User::class, 'leader_id');
    }

    public function lecturers(){
        return $this->hasMany(User::class);
    }

    public function registration_link(){
        return $this->hasOne(RegistrationLink::class);
    }

}
