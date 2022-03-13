<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends BaseModel
{

    protected $fillable = [
        'text',
        'user_id',
        'internship_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function internship(){
        return $this->belongsTo(Internship::class);
    }

}
