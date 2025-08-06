@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-md rounded-xl p-6 mt-10">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">احجز موعد</h2>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif


    <form action="{{ route('booking.store') }}" method="POST" class="space-y-5">
        @csrf

        {{-- اختيار الدكتور --}}
        <div>
            <label class="block mb-1">الدكتور:</label>
            <select name="doctor_id" class="w-full border rounded px-3 py-2" required>
                <option disabled selected>-- اختر دكتور --</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">
                        {{ $doctor->name }}. " ". ({{ $doctor->specialty->name }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- التاريخ --}}
        <div>
            <label class="block mb-1">التاريخ:</label>
            <input type="date" name="date" class="w-full border rounded px-3 py-2" required>
        </div>

        {{-- الوقت --}}
        <div>
            <label class="block mb-1">الوقت:</label>
            <input type="time" name="time" class="w-full border rounded px-3 py-2" required>
        </div>

        {{-- نوع الحجز --}}
        <div>
            <label class="block mb-1">نوع الحجز:</label>
            <select name="booking_type" class="w-full border rounded px-3 py-2" required>
                <option disabled selected>-- اختر --</option>
                <option value="كشف">كشف</option>
                <option value="استشارة">استشارة</option>
                <option value="حجز جديد">حجز جديد</option>
            </select>
        </div>

        {{-- زر الحجز --}}
        <div class="text-center">
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded-lg">
                احجز الآن
            </button>
        </div>
    </form>
</div>
@endsection
