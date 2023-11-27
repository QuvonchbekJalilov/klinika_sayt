<?php

namespace App\Http\Controllers;

use App\Models\Desease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{

    public function __construct(){
            $this->middleware("auth")->except('index','show');
    }
    public function index()
    {
        $deseases = Desease::paginate(3);
        return view('feature.index')->with('deseases', $deseases);
    }


    public function create()
    {
        return view('feature.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:255',
            'image' => 'nullable|image|max:2048',


        ]);
        if ($request->hasFile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('deseases_image', $name);
            //$path = $request->file("image")->store('deseases_image', 'local') bu qaysi papkaga saqlash yo'li
        }
        $desease = Desease::create(
            [
                'name' => $request->name,
                'user_id' => auth()->user()->id,
                'description' => $request->description,
                'image' => $path ?? null,
            ]
        );

        return redirect()->route('feature.index');
    }


    public function show($id)
    {
        $desease = Desease::find($id);

        return view('feature.show', ['desease' => $desease]);
    }


    public function edit(Desease $feature)
    {
        Gate::authorize('update', $feature);

        return view('feature.edit', ['feature' => $feature]);
    }


    public function update(Request $request, Desease $feature)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:255',
            'image' => 'nullable|image|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('deseases_image', $name);
            $feature->image = $path;
        }
    
        $feature->name = $request->name;
        $feature->description = $request->description;
        $feature->save();
    
        return redirect()->route('feature.index');
    }
    



    public function destroy(Desease $feature)
    {
        Gate::authorize('delete', $feature);


        if (isset($feature->image)){
            Storage::delete($feature->image);
        }
        // Detach all related tags first
      
        $feature->delete();

        return redirect(route('feature.index'));
    }
}
