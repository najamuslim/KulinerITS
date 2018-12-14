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

            //return view('admin.show_tempat', ['tempat_makans'=>$tempat_makans]);
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
    public function show(TempatMakan $tempatmakan)
    {
        $tempatmakan = TempatMakan::find($tempatmakan->id);
        //echo $tempatMakan->id;
        return view('riview', ['tempatmakan'=>$tempatmakan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TempatMakan  $tempatMakan
     * @return \Illuminate\Http\Response
     */
    public function edit(TempatMakan $tempatmakan)
    {
        //return $tempatMakan;
        $tempatmakan = TempatMakan::find($tempatmakan->id);
        return view('admin.edit', ['tempatmakan'=>$tempatmakan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TempatMakan  $tempatMakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TempatMakan $tempatmakan)
    {
        $tempatmakan = TempatMakan::find($tempatmakan->id);

        $tempatmakan->tempat_name = $request->tempat_name;
        $tempatmakan->tipe_makanan = $request->tipe_makanan;
        $tempatmakan->alamat = $request->alamat;

        if($tempatmakan->save()){
            return redirect()->route('tempatmakan.index')->with('success',$tempatmakan->tempat_name.' Record has been updated Succesfully');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TempatMakan  $tempatMakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TempatMakan $tempatmakan)
    {
        $s = TempatMakan::find($tempatmakan->id);
        if($s->delete()){
            return redirect()->route('tempatmakan.index')->with('success', $tempatmakan->tempat_name. ' record has been deleted');
        }
    }
}
