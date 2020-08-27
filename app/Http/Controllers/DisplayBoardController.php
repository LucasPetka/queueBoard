<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Appointment;

class DisplayBoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function displayBoardData()
    {
        return view('queueBoard');
    }

    public function getBoardData()
    {
        $queueBoard_data = [];
        $specialists = User::all();

        foreach ($specialists as $specialist) {

            $specialistQueue = [
                'specialist' => $specialist->name,
                'current_state' => $specialist->appointment,
                'queue' => Appointment::where('specialist_id', $specialist->id)->orderBy('created_at', 'asc')->get(),
            ];

            array_push($queueBoard_data, $specialistQueue);
        }

        return $queueBoard_data;
    }
}
