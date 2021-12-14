<?php

namespace App\Http\Controllers;

use App\Models\Prijave;
use Illuminate\Http\Request;
use App\Http\Resources\PrijaveResource;
use App\Http\Resources\PrijaveCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
        //Validator zapravo kreira neki objekat i smesta ga unutar promenljive validator
        $validator=Validator::make($request->all(),[
            'kurs'=>'required|string|max:255',
            'cena'=>'required|string|max:100',
            'vrstaprijave_id'=>'required',
            'profesor_id'=>'required'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        $prijava=Prijave::create([
            'kurs'=>$request->kurs,
            'cena'=>$request->cena,
            'vrstaprijave_id'=>$request->vrstaprijave_id,
            'user_id'=>Auth::user()->id,
            'profesor_id'=>$request->profesor_id,
        ]);

        return response()->json(['Prijava je uspešno kreirana.', new PrijaveResource($prijava)]);
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
        $validator=Validator::make($request->all(),[
            'kurs'=>'required|string|max:255',
            'cena'=>'required|string|max:100',
            'vrstaprijave_id'=>'required',
            'profesor_id'=>'required'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        $prijave->kurs=$request->kurs;
        $prijave->cena=$request->cena;
        $prijave->vrstaprijave_id=$request->vrstaprijave_id;
        $prijave->profesor_id=$request->profesor_id;

        $prijave->save();

        return response()->json(['Prijava je uspešno ažurirana.',new PrijaveResource($prijave)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prijave  $prijave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prijave $prijave)
    {
        $prijave->delete();
        return response()->json('Prijava je uspešno obrisana.');
    }
}
