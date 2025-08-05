<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'receptionist_id',
        'date',
        'time',
        'booking_type',
        'source',
        'paid',
        'amount_paid',
        'status',
    ];
     public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function receptionist()
    {
        return $this->belongsTo(Receptionist::class);
    }
}
