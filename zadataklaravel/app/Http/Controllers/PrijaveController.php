<?php

namespace App\Http\Controllers;

use App\Models\Prijave;
use Illuminate\Http\Request;
use App\Http\Resources\PrijaveResource;
use App\Http\Resources\PrijaveCollection;


class PrijaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dobijamo sve prijave iz baze
        $prijave=Prijave::all();
        return new PrijaveCollection($prijave);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prijave  $prijave
     * @return \Illuminate\Http\Response
     */
    public function show(Prijave $prijave)
    {
        /*$prijava=Prijave::find($prijave_id);
        if(is_null($prijava)) {
            return response()->json('Prijava nije pronađena', 404);
        }
        return response()->json($prijava);*/

        return new PrijaveResource($prijave);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prijave  $prijave
     * @return \Illuminate\Http\Response
     */
    public function edit(Prijave $prijave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prijave  $prijave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prijave $prijave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prijave  $prijave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prijave $prijave)
    {
        //
    }
}
