<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{
    //

    public function index()
    {
        $doctors = Doctor::with('specialty')->get();
        return view('booking.index', compact('doctors'));
    }




    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
            'time' => 'required',
            'booking_type' => 'required|in:كشف,استشارة,حجز جديد',
        ]);

        // 🔍 التحقق من وجود حجز مسبق
        $exists = Appointment::where('doctor_id', $request->doctor_id)
            ->where('date', $request->date)
            ->where('time', $request->time)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'تم حجز هذا الموعد مسبقًا للدكتور');
        }

        // ✅ الحجز متاح → نحجزه
        Appointment::create([

            'patient_id' => Auth::user()->patient->id,
            'doctor_id' => $request->doctor_id,
            'date' => $request->date,
            'time' => $request->time,
            'booking_type' => $request->booking_type,
            'source' => 'online',
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'تم حجز الموعد بنجاح ✅');
    }



public function myAppointments()
{
    $appointments = Appointment::with(['doctor', 'patient'])
        ->where('patient_id', Auth::user()->patient->id)
        ->orderBy('date', 'desc')
        ->orderBy('time', 'asc')
        ->get();

    return view('booking.my_appointments', compact('appointments'));
}
}
