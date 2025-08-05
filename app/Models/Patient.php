<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'email',
        'birth_date',
        'gender',
        'address',
        'medical_history',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
