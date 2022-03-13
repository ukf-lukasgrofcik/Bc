<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyProgramme extends BaseModel
{

    protected $fillable = [
        'name',
    ];

    public function subjects(){
        return $this->hasMany(Subject::class);
    }

}
