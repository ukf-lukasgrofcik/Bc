<?php

namespace App\Models;

class Image extends BaseModel
{

    protected $fillable = [
        'name',
        'basename',
        'path',
        'type',
    ];

    public function imageable(){
        return $this->morphTo('imageable');
    }

    public function getFullPath($type){
        return $this->path . $type . "_" . $this->basename;
    }

}
