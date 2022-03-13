<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends BaseModel
{

    protected $fillable = [
        'name',
        'study_programme_id',
    ];

    public function study_programme(){
        return $this->belongsTo(StudyProgramme::class);
    }

    public function internships(){
        return $this->hasMany(Internship::class);
    }

}
