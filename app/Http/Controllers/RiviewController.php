<?php

namespace App\Http\Controllers;

use App\Riview;
use Illuminate\Http\Request;

class RiviewController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if(\App\Riview::where([['tempat_id','=',$request->input('tempat_id')],['user_id', '=', \Auth::user()->id]])->get()->count()==0) {
           $like = Riview::create([
               'user_id' => \Auth::user()->id,
               'tempat_id' => $request->input('tempat_id'),
               'like' => $request->input('like'),
           ]);
       }
       else {
           $like = Riview::where([['tempat_id','=',$request->input('tempat_id')],['user_id', '=', \Auth::user()->id]])->first();
           if($like->like == 0)
                $like->like = 1;
           else
                $like->like = 0;
           $like->save();

       }
           $jumlahlike = \App\Riview::where([['tempat_id', '=', $request->input('tempat_id')], ['like', '=', 1]])->get()->count();
           return response($jumlahlike);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Riview  $riview
     * @return \Illuminate\Http\Response
     */
    public function show(Riview $riview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Riview  $riview
     * @return \Illuminate\Http\Response
     */
    public function edit(Riview $riview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Riview  $riview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Riview $riview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Riview  $riview
     * @return \Illuminate\Http\Response
     */
    public function destroy(Riview $riview)
    {
        //
    }
}
