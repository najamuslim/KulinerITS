<?php

namespace App\Http\Controllers;

use App\Riview;
use App\TempatMakan;
use App\TipeMakanan;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class TempatMakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tempat_makans = TempatMakan::paginate(5);
        return view('show_tempat',['tempat_makans'=>$tempat_makans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipe_makanans = TipeMakanan::all();
        return view('tempatmakan.create',['tipe_makanans'=>$tipe_makanans]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $tempat_makans = TempatMakan::where('tempat_name','like', '%'.$search.'%')->paginate(5);
        return view('show_tempat', ['tempat_makans'=>$tempat_makans]);
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
            'alamat' => 'required'
        ]);

        $tempatmakan = TempatMakan::create([
            'tempat_name' => $request->input('tempat_name'),
            'alamat' => $request->input('alamat'),
        ]);

        $tipes = $request->input('tipe_makanan');
        if(!empty($tipes)) {
            foreach ($tipes as $key=>$tipe)
            $tempatmakan->tipemakanan()->attach([$tipe]);
        }

        if($tempatmakan){
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
        $temp = $tempatmakan->tipemakanan()->get();
        $tipe_select = array();
        foreach ($temp as $item)
            $tipe_select[$item->id] = true;

        $tipe_makanans = TipeMakanan::all();
        $tempatmakan = TempatMakan::find($tempatmakan->id);
        return view('admin.edit', ['tempatmakan'=>$tempatmakan],['tipe_makanans'=>$tipe_makanans])->with(compact('tipe_select'));
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
        \DB::table('tipe_tempats')->where('id_tempat',$tempatmakan->id)->delete();
        $tempatmakan = TempatMakan::find($tempatmakan->id);
        $this->validate($request,[
            'tempat_name' => 'required',
            'alamat' => 'required',
        ],[
            'tempat_name.required' => 'Place name required!',
            'alamat.required' => 'Place address required!'
        ]);
        $tempatmakan->tempat_name = $request->tempat_name;
        $tempatmakan->alamat = $request->alamat;

        $tipes = $request->input('tipe_makanan');
        if(!empty($tipes)) {
            foreach ($tipes as $key=>$tipe)
                $tempatmakan->tipemakanan()->attach([$tipe]);
        }

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
        \DB::table('tipe_tempats')->where('id_tempat',$tempatmakan->id)->delete();
        $s = TempatMakan::find($tempatmakan->id)->delete();
        if($s){
            return redirect()->route('tempatmakan.index')->with('success', $tempatmakan->tempat_name. ' record has been deleted');
        }
    }
}
