<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\createUserRequest;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Session;


class UserController extends Controller
{
    //inscription
    public function inscription(){
        return view('inscription');
    }

    public function gestionInscription(User $user,createUserRequest $request){
        $user -> name = $request -> nom;
        $user -> prenom = $request -> prenom;
        $user -> username = $request -> username;
        $user -> email = $request -> email;
        $user -> password = Hash::make($request -> password);
        $user -> save();
        
        return redirect()->route('acceuil')->with('success', 'Inscription réussie, connectez-vous');
    }

    //connexion
    public function connexion(){
        return view('connexion');
    }

    public function gestionConnexion(Request $request ){

        $credentials = $request->validate(
            ['email' => ['required', 'email'], 
             'password' => ['required'],
            ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('index');
        }
        else {
            return redirect()->back()->with('error', 'Compte inexistant');
        }
    }


    //Tableau de bord
    public function dashboard(){
        return view('dashboard');
    }

    //Deconnexion
    public function deconnexion(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('connexion');
    }
}
