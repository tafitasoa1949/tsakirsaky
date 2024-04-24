<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produit;
use App\Http\Requests\ProduitRequest;
use App\Models\Unite;

class ProduitController extends Controller
{
    public function index(){
        $produit = Produit::all();
        return view('produit.index', ['produits' => $produit]);
    }
    public function create(){
        $unites = Unite::all();
        return view('produit.create',[
            'unites' => $unites
        ]);
    }
    public function insert(ProduitRequest $request){
        $data = array(
            		'nom' => $request->nom,
		'idunite' => $request->idunite

        );
        Produit::insert($data);
        return redirect()->route('produit.index');
    }
    public function update(ProduitRequest $request){
        $produit = Produit::find($request->id);
        $produit->nom = $request->nom;
        $produit->idunite = $request->idunite;
        $produit->save();
        return redirect()->route('produit.index');
    }
    public function delete($id){
        $produit = Produit::findOrFail($id);
        $produit->delete();
        return redirect()->route('produit.index');
    }
}
