<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $commentaire=Commentaire::all();
        return view('pages.videoc',compact('commentaire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.creactec');
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
        request()->validate([
            "nom"=>["required", "min:1", "max:140"],
            "prenom"=>["required", "min:1", "max:140"],
            "dateDePublication"=>["required", "min:1", "max:15"],
            "contenu"=>["required", "min:1", "max:350"],
            
        ]);
        $newEntry = new Commentaire();
        $newEntry->nom = $request->nom;
        $newEntry->prenom = $request->prenom;
        $newEntry->dateDePublication = $request->dateDePublication;
        $newEntry->contenu = $request->contenu;
        
        $newEntry->save();

        $request->file("img")->storePublicly("img","public");
        return redirect('/commentaires');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Commentaire $commentaire)
    {
        //
        return view('pages.showc', compact('commentaire'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Commentaire $commentaire)
    {
        //
        return view('pages.editc', compact('commentaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        //
        request()->validate([
            "nom"=>["required", "min:1", "max:140"],
            "prenom"=>["required", "min:1", "max:140"],
            "dateDePublication"=>["required", "min:1", "max:15"],
            "contenu"=>["required", "min:1", "max:350"],
        ]);
        
        $commentaire->nom= $request->nom;
        $commentaire->prenom = $request->prenom;
        $commentaire->dateDePublication = $request->dateDePublication;
        $commentaire->contenu = $request->contenu;
        
        $commentaire->save();
        
        return redirect()->route("commentaires.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commentaire $commentaire)
    {
        //
        
        $commentaire->delete();
        return redirect()->route("commentaires.index");
    }
}
