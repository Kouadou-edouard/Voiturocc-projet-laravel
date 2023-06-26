<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function location(){
        return view('commande');
    }   

    public function gestionLocation(Request $request){
 
        $location = $request -> validate([
            'nom' => 'required|min: 3',
            'prenom' => 'required|min: 3',
            'debut_date' => 'required',
            'fin_date' => 'required'
         
        ]);  
        return redirect()->route('acceuil')->with('sucess', 'Commande effectué avec succès');
    }

}
