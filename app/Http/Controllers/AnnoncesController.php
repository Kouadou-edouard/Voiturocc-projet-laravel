<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Middleware;
use App\Http\Request\AnnoncesRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Annonces;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;



class AnnoncesController extends Controller
{
    public function annonces(){
        return view('annonces');
    }   
// CREER UNE ANNONCE
    public function gestionAnnonces(Request $request){
 
        $valideAnnonces = $request -> validate([
            'Immatriculation' => 'required|min: 3',
            'Marque' => 'required|min: 3',
            'Tarifs' => 'required',
            'annoncesImg' => 'required'
         
        ]);

        $nom_fichier = time().'.'.$request->annoncesImg->extension();
        $path = Storage::disk('public')->put('pictures', $nom_fichier);
        
        $valideAnnonces= new Annonces();
        $valideAnnonces -> Immatriculation = $request -> Immatriculation;
        $valideAnnonces -> Marque = $request -> Marque;
        $valideAnnonces -> Tarifs = $request -> Tarifs;
        $valideAnnonces -> image = $path; 
        $valideAnnonces -> user_id = Auth::id(); 
 
        $valideAnnonces -> save();   
        
        return redirect()->route('acceuil')->with('sucess', 'Annonces ajouté');
    }

    // LIRE UNE ANNONCE

    public function annoncesListe(Request $request){

        if ($request->filled('recherche')){
            $AnnoncesListes = Annonces::search($request->recherche)->get();
            $AnnoncesListes= Annonces::paginate(6);

         }else {
            $AnnoncesListes = Annonces::paginate(6); 
            //$AnnoncesListes = Annonces::all();  
        
            $lire_image = Storage::disk('public')->getVisibility('images');
            //dd($lire_image);
         }    
        return view('index', compact('AnnoncesListes'));
    }

    public function annoncesListeDashboard(){
       
        $AnnoncesListes = Annonces::all();  
        
         $lire_image = Storage::disk('public')->getVisibility('images');
         //dd($lire_image);
        return view('dashboard', compact('AnnoncesListes', 'lire_image'));
    }


      // MODIFIER UNE ANNONCE
    public function update($id){

        $AnnoncesUpdate = Annonces::find($id);
       
        return view('modifier',['AnnoncesUpdate' => $AnnoncesUpdate]);
    }
 
    public function gestionUpdate(Request $request, Annonces $AnnoncesUpdates){

        $AnnoncesUpdates = $request -> validate([
            'Immatriculation' => 'required|min: 3',
            'Marque' => 'required|min: 3',
            'Tarifs' => 'required',
            'annoncesImg' => 'required'
         
        ]);
        Storage::disk('local')->put('images', $request->annoncesImg);
        
       
        $AnnoncesUpdates = Annonces::find($request ->id);
        $AnnoncesUpdates -> Immatriculation = $request -> Immatriculation;
        $AnnoncesUpdates -> Marque = $request -> Marque;
        $AnnoncesUpdates -> Tarifs = $request -> Tarifs;
        $AnnoncesUpdates -> image = $request -> annoncesImg;
        $AnnoncesUpdates -> update(); 
        

        return redirect()->route('acceuil')->with('sucess', 'Annonces mis à jour');
    }

      // SUPPRIMER UNE ANNONCE

      public function supprimerAnnonce($id){
        $suppr_annonce = Annonces::find($id);
        $suppr_annonce->delete();
        return redirect()->route('acceuil')->with('sucess', 'Annonces supprimer avec succès');
    }
   
}


