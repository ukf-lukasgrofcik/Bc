<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function clearance($role){
        return in_array($this->role, config("settings.clearance.$role"));
    }

    public function formatAmount($column, $decimals = 2, $dec_point = ',', $thousand_sep = ' '){
        return $this->$column ? number_format($this->$column, $decimals, $dec_point, $thousand_sep) : null;
    }

    public function formatTimestamp($column, $format = 'Y-m-d H:i:s'){
        return $this->$column ? Carbon::parse($this->$column)->format($format) : null;
    }

    public function scopeRole($query, $roles){
        return is_array($roles) ? $query->whereIn('role', $roles) : $query->where('role', $roles);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function workplace(){
        return $this->belongsTo(Workplace::class);
    }

    public function internship(){
        return $this->hasOne(Internship::class, 'student_id');
    }

    public function employee_internships(){
        return $this->hasMany(Internship::class, 'worker_id');
    }

    public function lecturer_internships(){
        return $this->hasMany(Internship::class, 'tutor_id');
    }

    public function registration_link(){
        return $this->hasOne(RegistrationLink::class);
    }

    public function getFormattedRoleAttribute(){
        return trans("clearance.$this->role");
    }

}
