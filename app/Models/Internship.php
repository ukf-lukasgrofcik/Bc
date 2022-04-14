<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends BaseModel
{

    protected $fillable = [
        'academic_year_id',
        'student_id',
        'tutor_id',
        'worker_id',
        'status_id',
        'type_id',
        'subject_id',
        'company_id',
    ];

    public function files(){
        return $this->morphMany(File::class, 'fileable');
    }

    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }

    public function academic_year(){
        return $this->belongsTo(AcademicYear::class);
    }

    public function tutor(){
        return $this->belongsTo(User::class, 'tutor_id');
    }

    public function worker(){
        return $this->belongsTo(User::class, 'worker_id');
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function entries(){
        return $this->hasMany(Entry::class);
    }

    public function getStatementAttribute(){
        return $this->files->where('type', 'statement')->count() > 0
            ? $this->files->where('type', 'statement')->sortByDesc('created_at')->first()
            : false;
    }

    public function getContractAttribute(){
        return $this->files->where('type', 'contract')->count() > 0
            ? $this->files->where('type', 'contract')->sortByDesc('created_at')->first()
            : false;
    }

    public function getCertificationAttribute(){
        return $this->files->where('type', 'certification')->count() > 0
            ? $this->files->where('type', 'certification')->sortByDesc('created_at')->first()
            : false;
    }

}
