<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
     protected $fillable = [
        'name',
        'specialty_id',
        'available_days',
        'phone',
        'email',
    ];

    protected $casts = [
        'available_days' => 'array',
    ];

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function appointments()
{
    return $this->hasMany(Appointment::class);
}

}
