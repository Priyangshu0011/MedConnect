<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function create(Doctor $doctor)
    {
        return view('appointments.create', compact('doctor'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => ['required', 'exists:doctors,id'],
            'appointment_date' => ['required', 'date', 'after_or_equal:today'],
            'appointment_time' => ['required', 'date_format:H:i'],
            'notes' => ['nullable', 'string', 'max:500'],
        ]);

        $appointment = Appointment::create([
            'patient_id' => Auth::id(),
            'doctor_id' => $validated['doctor_id'],
            'appointment_date' => $validated['appointment_date'],
            'appointment_time' => $validated['appointment_time'],
            'notes' => $validated['notes'],
            'status' => 'pending',
        ]);

        \Illuminate\Support\Facades\Mail::to(Auth::user()->email)->send(new \App\Mail\AppointmentConfirmed($appointment));

        return redirect()->route('dashboard')->with('success', 'Appointment booked successfully!');
    }

    public function index()
    {
        // Handled in DashboardController mostly, but if we need a separate view:
        $user = Auth::user();
        if ($user->role === 'doctor') {
            $appointments = Appointment::where('doctor_id', $user->doctorProfile->id)->with('patient')->get();
        } else if ($user->role === 'patient') {
            $appointments = Appointment::where('patient_id', $user->id)->with('doctor.user')->get();
        } else {
            $appointments = Appointment::with(['patient', 'doctor.user'])->get();
        }

        return view('appointments.index', compact('appointments'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        // For doctors to update status
        if (Auth::user()->role === 'doctor' && $appointment->doctor_id !== Auth::user()->doctorProfile->id) {
            abort(403);
        }

        $validated = $request->validate([
            'status' => ['required', 'in:confirmed,completed,cancelled'],
        ]);

        $appointment->update(['status' => $validated['status']]);

        return back()->with('success', 'Appointment status updated.');
    }
}
