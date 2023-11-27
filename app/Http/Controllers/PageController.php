<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function main(){
        return view('main');
    }

    public function about(){
        return view('about');
    }
    public function service(){
        return view('service');
    }

    public function contact(){
        return view('contact');
    }
    public function appointment(){
        return view('appointment');
    }

    public function list(){
        return view('list',['appointment' => Appointment::all()->sortDesc()]);
    }
}
