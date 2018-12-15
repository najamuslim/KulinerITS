<?php

namespace App\Http\Controllers;

use App\TipeMakanan;
use Illuminate\Http\Request;

class TipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createtipe');
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
            'tipe_makanan' => 'required'
        ]);

        $tipe = TipeMakanan::create([
            'tipe_makanan' => $request->input('tipe_makanan'),
        ]);

        if($tipe){
            return redirect()->route('tipe.create')->with('success', 'Type Record Successfully..!');
        }
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipeMakanan  $tipeMakanan
     * @return \Illuminate\Http\Response
     */
    public function show(TipeMakanan $tipeMakanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipeMakanan  $tipeMakanan
     * @return \Illuminate\Http\Response
     */
    public function edit(TipeMakanan $tipeMakanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipeMakanan  $tipeMakanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipeMakanan $tipeMakanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipeMakanan  $tipeMakanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipeMakanan $tipeMakanan)
    {
        //
    }
}
