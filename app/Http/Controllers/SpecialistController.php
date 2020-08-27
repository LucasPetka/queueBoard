<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use Auth;

class SpecialistController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function specialistHomepage()
    {
        $specialist = Auth::user();
        $appointments = Appointment::where('specialist_id', $specialist->id)
        ->orderBy('created_at', 'asc')
        ->get();

        return view('specialists.specialist_home')->with(compact('appointments', 'specialist'));
    }

    public function startAppointment($appointment_id)
    {
        $specialist = Auth::user();
        $appointment = Appointment::find($appointment_id);

        if($specialist->appointment != null){
            return back()->with('error', 'One appointment at a time!');
        }

        $specialist->appointment = $appointment->appointment_number;
        $specialist->save();

        return redirect('/home');
    }

    public function endAppointment($appointment_id)
    {
        $appointment = Appointment::find($appointment_id);
        $appointment->delete();

        $specialist = Auth::user();
        $specialist->appointment = null;
        $specialist->save();

        return redirect('/home')->with('info', $appointment->appointment_number.' appointment ended');
    }

    public function deleteAppointment($appointment_id)
    {
        $appointment = Appointment::find($appointment_id);
        $appointment->delete();
        return redirect('/home')->with('error', $appointment->appointment_number.' appointment canceled');
    }
}
