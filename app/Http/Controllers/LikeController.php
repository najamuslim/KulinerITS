<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
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
        if(\App\Like::where([['tempat_id','=',$request->input('tempat_id')],['user_id', '=', \Auth::user()->id]])->get()->count()==0) {
            $like = Like::create([
                'user_id' => \Auth::user()->id,
                'tempat_id' => $request->input('tempat_id'),
                'like' => $request->input('like'),
            ]);
        }
        else{
            $like = Like::where([['tempat_id','=',$request->input('tempat_id')],['user_id', '=', \Auth::user()->id]])->first();
            if($like->like == 0)
                $like->like = 1;
            else
                $like->like = 0;
            $like->save();
        }
        $jumlahlike = \App\Like::where([['tempat_id','=',$request->input('tempat_id')],['like','=',1]])->get()->count();
        return response($jumlahlike);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }
}
