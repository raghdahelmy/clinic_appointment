<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
            $table->foreignId('receptionist_id')->nullable()->constrained()->onDelete('set null');

            $table->date('date');
            $table->time('time');

            $table->enum('booking_type', ['كشف', 'استشارة', 'حجز جديد']);
            $table->enum('source', ['online', 'clinic'])->default('online');

            $table->boolean('paid')->default(false);
            $table->decimal('amount_paid', 8, 2)->nullable();

            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
