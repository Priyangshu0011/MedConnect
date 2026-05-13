<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f3f4f6; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <h2 style="color: #4F46E5;">MedConnect - Appointment Received</h2>
        
        <p>Dear {{ $appointment->patient->name }},</p>
        
        <p>Your appointment request has been successfully received and is currently marked as <strong>{{ ucfirst($appointment->status) }}</strong>.</p>
        
        <div style="background-color: #f8fafc; padding: 15px; border-radius: 6px; margin: 20px 0;">
            <p><strong>Doctor:</strong> Dr. {{ $appointment->doctor->user->name }} ({{ $appointment->doctor->department->name }})</p>
            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('l, F j, Y') }}</p>
            <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</p>
        </div>
        
        <p>Please check your dashboard for any updates to your appointment status.</p>
        
        <p>Thank you for choosing MedConnect!</p>
        
        <p style="color: #9ca3af; font-size: 0.8rem; margin-top: 30px; text-align: center;">
            &copy; {{ date('Y') }} MedConnect. All rights reserved.
        </p>
    </div>
</body>
</html>
