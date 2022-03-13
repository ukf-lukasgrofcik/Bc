<?php

namespace App\Models;

class File extends BaseModel
{

    protected $fillable = [
        'name',
        'filename',
        'path',
        'type',
    ];

    public function fileable(){
        return $this->morphTo('fileable');
    }

    public function getFullPathAttribute(){
        return $this->path . $this->filename;
    }

}
