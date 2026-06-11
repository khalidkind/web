<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\locations;

class LocationsController extends Controller
{
    public function index()
    {
        $viewlokasi = locations::get();
        return view('location.index', [
            'liatlokasi' => $viewlokasi,
            'title' => 'location'
        ]);
    }

    public function create()
    {
        return view('location.create',[
            'title' => 'location'
        ]);
    }

    public function store(request $request)
    {
        $request->validate([
            'location_name'=>'required',
            'max_motorcycle'=>'required',
            'max_car'=>'required',
            'max_other'=>'required'
        ]);

        locations::create([
            'location_name'=>$request->location_name,
            'max_motorcycle'=>$request->max_motorcycle,
            'max_car'=>$request->max_car,
            'max_other'=>$request->max_other
        ]);

        return redirect()->route('location.index')->with('message', 'Success');
    }
}
