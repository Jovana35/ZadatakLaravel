<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    //request prima parametre za registraciju
    public function register(Request $request)
    {
        //importuje se treci validator support\facades
        //drugi parametar su ogranicenja koja moramo da postujemo pri registraciji
        $validator=Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'email'=>'required|string|max:255|email|unique:users',
            'password'=>'required|string|min:6',
        ]);

        //Validator zapravo kreira neki objekat i smesta ga unutar promenljive validator

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        //kreira se user i cuva se u bazi i u promenljivoj $user
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        //kada radimo registraciju moramo da imamo tokene, tj korisnik mora da ima token da bi se posle ulogovao pomocu njega
        $token=$user->createToken('auth_token')->plainTextToken;
        return response()->json(['user'=>$user,'access_token'=>$token,'token_type'=>'Bearer']);
    }

    public function login(Request $request)
    {
        //ovde cemo da proveravamo autorizovanog korisnika
        //koristicemo klasu Auth koja se koristi za pristup autentifikovanom korisniku
        //kazemo okej proveri da li taj korisnik postoji, ko je taj korisnik
        if(!Auth::attempt($request->only('email','password'))) {
            return response()->json(['message'=>'Unauthorized'],401);
        }
        //vrati mi usera ciji je email zapravo ovaj email koji smo dobili u requestu, a ukoliko ih ima vise, 
        //vrati mi prvog
        $user=User::where('email',$request['email'])->firstOrFail();

        //registrovali smo se, dobili token, pa smo mogli da se ulogujemo, a sada cemo dobiti novi token i sa njim cemo
        //moci da se krecemo kroz stranicu
        //kreiramo token
        $token=$user->createToken('auth_token')->plainTextToken;
        return response()->json(['welcome message'=>'Hi '.$user->name, 'access_token'=>$token, 'token_type'=>'Bearer']);
    }

    public function logout() {
        auth()->user()->tokens()->delete();
        return [
            'goodbye message'=>'Uspešno ste se odjavili i token je uspešno obrisan.'
        ];
    }
}
