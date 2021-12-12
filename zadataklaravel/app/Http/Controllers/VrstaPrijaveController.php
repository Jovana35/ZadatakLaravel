<?php

namespace App\Http\Controllers;

use App\Http\Resources\VrstaPrijaveCollection;
use App\Models\VrstaPrijave;
use Illuminate\Http\Request;

class VrstaPrijaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //vraca sve vrste prijava iz baze
        $vrsteprijava=VrstaPrijave::all();
        //return $vrsteprijava;
        return new VrstaPrijaveCollection($vrsteprijava);
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
     * @param  \App\Models\VrstaPrijave  $vrstaPrijave
     * @return \Illuminate\Http\Response
     */
    public function show($vrstaPrijave_id)
    {
        $vrstaPrijave=VrstaPrijave::find($vrstaPrijave_id);
        if(is_null($vrstaPrijave)) {
            return response()->json('Vrsta prijave nije pronađena', 404);
        }
        return response()->json($vrstaPrijave);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VrstaPrijave  $vrstaPrijave
     * @return \Illuminate\Http\Response
     */
    public function edit(VrstaPrijave $vrstaPrijave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VrstaPrijave  $vrstaPrijave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VrstaPrijave $vrstaPrijave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VrstaPrijave  $vrstaPrijave
     * @return \Illuminate\Http\Response
     */
    public function destroy(VrstaPrijave $vrstaPrijave)
    {
        //
    }
}
