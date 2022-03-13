<?php

namespace App\Models;

class Entry extends BaseModel
{

    protected $fillable = [
        'text'
    ];

    public function files(){
        return $this->morphMany(File::class, 'fileable');
    }

    public function internship(){
        return $this->belongsTo(Internship::class);
    }

    public function getFileAttribute(){
        return $this->files->count() > 0
            ? $this->files->sortByDesc('created_at')->first()
            : false;
    }

}
