<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Appointment;
use Illuminate\Support\Str;
use Cookie;

class CustomerController extends Controller
{
    public function chooseSpecialistPage()
    {
        $users = User::all();

        $appointment_number = Cookie::get('appointment_number');
        $appointment= Appointment::where('appointment_number', $appointment_number)->first();

        if($appointment == null){
            Cookie::queue(Cookie::forget('appointment_number'));
        }

        return view('specialists')->with(compact('users', 'appointment'));
    }

    public function reserveAppointmentTime($id)
    {

        if(Cookie::get('appointment_number') !== null){
            return redirect('/specialists/select')->with('error', 'You can only wait in queue for single appointment.');
        }

        do{
            $randomString = strtoupper(Str::random(4));
        }while(Appointment::where('appointment_number', $randomString)->exists());

        $appointment = new Appointment();
        $appointment->specialist_id = $id;
        $appointment->appointment_number = $randomString;
        $appointment->save();

        Cookie::queue(Cookie::make('appointment_number', $randomString, 60, null, null, false, false));

        return redirect('/appointment/'.$appointment->id);
    }

    public function displayAppointmentInfo($appointment_id){

        $appointment = Appointment::find($appointment_id);
        $customersInFrontOfLine = Appointment::where('specialist_id', $appointment->specialist_id)
        ->where('created_at', '<', $appointment->created_at)
        ->count();

        return view('appointment_info')->with(compact('appointment', 'customersInFrontOfLine'));
    }

    public function cancelAppointment($appointment_id)
    {
        Appointment::find($appointment_id)->delete();
        Cookie::forget('appointment_number');
        return redirect('/specialists/select')->with('info', 'Appointment has been canceled!');

    }

}
