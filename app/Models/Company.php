<?php

namespace App\Models;


class Company extends BaseModel
{

    protected $fillable = [
        'name',
        'address',
        'email',
    ];

    public function employees(){
        return $this->hasMany(User::class);
    }

    public function internships(){
        return $this->hasMany(Internship::class);
    }

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function registration_link(){
        return $this->hasOne(RegistrationLink::class);
    }

}
