<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationLink extends BaseModel
{

    protected $fillable = [
        'hash',
        'role',
        'email',
        'company_id',
        'workplace_id',
        'registered',
    ];

    public function generateLink(){
        return route('register') . "?hash=$this->hash";
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function workplace(){
        return $this->belongsTo(Workplace::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
