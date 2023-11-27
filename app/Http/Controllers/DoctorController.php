<?php

namespace App\Http\Controllers;

use App\Models\Desease;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    
    public function index()
    {
        return view("doctor.index" , ['doctors' => Doctor::all()]);
    }

    
    public function create()
    {
        return view("doctor.create", ['deseases' => Desease::all()]);
    }

    
    public function store(Request $request)
    {

        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('doctor_image', $name);

        Doctor::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'desease_id' => $request->desease,
            'image' => $path,
            'email' => $request->email,
            'description' => $request->description
        ]);

        return redirect()->route('doctor.index');
    }

    
    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('doctor.show', ['doctor'=> $doctor]);
    }


    public function edit(Doctor $doctor)
    {
        return view('doctor.edit',['doctor'=> $doctor]);        
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email'=> 'required|email',
            'image'=> 'nullable|image|max:2048',
            'desease' => 'required|exists:deseases,id', 
        ]);

        $doctor->first_name = $request->input('first_name');
        $doctor->last_name = $request->input('last_name');
        $doctor->desease_id = $request->input('desease');
        $doctor->image = $request->input('image');
        $doctor->email = $request->input('email');
        $doctor->description = $request->input('description');

        if ($request->hasFile('image')) {
            // Delete the old photo (if it exists)
            Storage::delete($doctor->image);

            $name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('doctor_image', $name);

            $doctor->image = $path;
        }

        $doctor->save();

        return redirect('doctor.index')->with('success','');


    }

    
    public function destroy(Doctor $doctor)
    {
        if(isset($doctor->image)){
            Storage::delete($doctor->image);
        }
        $doctor->delete();
        
        return redirect('doctor.index')->with('success','');
    }
}
