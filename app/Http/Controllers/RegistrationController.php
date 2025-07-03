<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        return Registration::with(['user', 'payment', 'status'])
            ->where('user_id', $request->user()->id)
            ->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'payment_id' => 'required|exists:payments,id',
            'status_id' => 'required|exists:status,id',
        ]);

        $registration = Registration::create([
            'user_id' => $request->user()->id,
            'event_id' => $validated['event_id'],
            'payment_id' => $validated['payment_id'],
            'status_id' => $validated['status_id'],
        ]);

        return response()->json($registration, 201);
    }

    public function destroy(Registration $registration)
    {
        $this->authorize('delete', $registration);

        $registration->delete();

        return response()->noContent();
    }
}
