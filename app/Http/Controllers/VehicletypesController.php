<?php

namespace App\Http\Controllers;

use App\Models\vehicletypes;
use Illuminate\Http\Request;

class VehicletypesController extends Controller
{
    public function index()
    {
        $viewkendaraan = vehicletypes::get();
        return view('vehicle.index', [
            'liatkendaraan' => $viewkendaraan,
            'title' => 'vehicle'
        ]);
    }

    public function create()
    {
        return view('vehicle.create',[
            'title' => 'vehicle'
        ]);
    }

    public function store(request $request)
    {
        $request->validate([
            'jenis'=>'required',
            'perjam_pertama'=>'required',
            'perjam_berikutnya'=>'required',
            'max_perhari'=>'required'
        ]);

        vehicletypes::create([
            'jenis'=>$request->jenis,
            'perjam_pertama'=>$request->perjam_pertama,
            'perjam_berikutnya'=>$request->perjam_berikutnya,
            'max_perhari'=>$request->max_perhari
        ]);

        return redirect()->route('vehicle.index')->with('message', 'success');
    }
}
