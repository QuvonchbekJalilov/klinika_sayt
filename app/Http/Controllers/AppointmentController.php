<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\App;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Support\Facades\Session;

class AppointmentController extends Controller
{
    
    public function index()
    {
        return view('appointment.index',['doctors'=> Doctor::all()]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {

        /*$request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'doctor_id'=>'required',
            'month' => 'required',
            'date' => 'required',
            'description'=>'required|max:255'

        ]);*/

        Appointment::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'doctor_id' => $request->doctor,
            'month' => $request->month,
            'time' => $request->time,
            'description' => $request->description
        ]);
        

        Session::flash('success', "Siz Ro'yxatga olindingiz");
        return redirect()->route('appointment.index');
    }

    

    
    public function show(Appointment $appointment)
    {
        //
    }

    
    public function edit(Appointment $appointment)
    {
        //
    }

    
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    
    public function destroy(Appointment $appointment)
    {
        //
    }
}
