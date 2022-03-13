<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends BaseModel
{

    protected $fillable = [
        'name',
    ];

    public function internships(){
        return $this->hasMany(Internship::class);
    }

}
