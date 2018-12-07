<?php

namespace App\Http\Controllers;

use App\TempatMakan;
use Illuminate\Http\Request;

class TempatMakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tempat_makans = TempatMakan::all();
        return view('show_tempat', ['tempat_makans'=>$tempat_makans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tempatmakan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tempat_name' => 'required',
            'tipe_makanan' => 'required',
            'alamat' => 'required'
        ]);

        $student = TempatMakan::create([
            'tempat_name' => $request->input('tempat_name'),
            'tipe_makanan' => $request->input('tipe_makanan'),
            'alamat' => $request->input('alamat'),
        ]);

        if($student){
            return redirect()->route('tempatmakan.create')->with('success', 'Place Record Successfully..!');
        }
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TempatMakan  $tempatMakan
     * @return \Illuminate\Http\Response
     */
    public function show(TempatMakan $tempatMakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TempatMakan  $tempatMakan
     * @return \Illuminate\Http\Response
     */
    public function edit(TempatMakan $tempatMakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TempatMakan  $tempatMakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TempatMakan $tempatMakan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TempatMakan  $tempatMakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TempatMakan $tempatMakan)
    {
        //
    }
}
