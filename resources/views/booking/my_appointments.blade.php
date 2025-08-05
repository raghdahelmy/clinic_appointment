@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">مواعيدي المحجوزة</h2>

    @forelse ($appointments as $appointment)
        <div class="bg-white shadow rounded-lg p-4 mb-4">
            <p><strong>التاريخ:</strong> {{ $appointment->date }}</p>
            <p><strong>الوقت:</strong> {{ $appointment->time }}</p>
            <p><strong>نوع الحجز:</strong> {{ $appointment->booking_type }}</p>
            <p><strong>الدكتور:</strong> {{ $appointment->doctor->name }} ({{ $appointment->doctor->specialty->name }})</p>
            <p><strong>الحالة:</strong>
                @if($appointment->status == 'pending')
                    <span class="text-yellow-500">قيد الانتظار</span>
                @elseif($appointment->status == 'confirmed')
                    <span class="text-green-600">مؤكد</span>
                @else
                    <span class="text-red-500">ملغي</span>
                @endif
            </p>
        </div>
    @empty
        <div class="bg-yellow-100 text-yellow-800 p-4 text-center rounded">
            لا يوجد أي مواعيد محجوزة حتى الآن.
        </div>
    @endforelse
</div>
@endsection
