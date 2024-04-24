<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pack;
use App\Http\Requests\PackRequest;
use App\Models\Composition;
use App\Models\ImagePack;
use App\Models\Produit;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class PackController extends Controller
{
    public function index(){
        $pack = Pack::all();
        return view('pack.index', ['packs' => $pack]);
    }
    public function create(){
        $produits = Produit::all();
        return view('pack.create',[
            'produits' => $produits
        ]);
    }
    public function insert(PackRequest $request){
        DB::beginTransaction();
        try{
            $data = array(
                'nom' => $request->nom,
                'prix' => $request->prix
            );
            $idpack = Pack::insert($data);

            //image
            if($request->file('image')){
                $imagePath = $request->file('image')->store('pack','public');
                $imagePack = new ImagePack();
                $imagePack->idpack = $idpack;
                $imagePack->path = $imagePath;
                $imagePack->save();
            }

            //composant
            $tab_produits = $request->idproduit;
            $tab_quantite = $request->quantite;
            for($i=0 ; $i < count($tab_produits) ; $i++){
                $dataCompo = array(
                    'idpack' => $idpack,
                    'idproduit' => $tab_produits[$i],
                    'quantite' => $tab_quantite[$i]
                );
                Composition::insert($dataCompo);
            }

            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            //dd($e);
            // Vous pouvez également enregistrer l'erreur ou la renvoyer à l'utilisateur
            //return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors de l\'insertion.']);
        }
        return redirect()->route('pack.index');

    }
    public function update(PackRequest $request){
        $pack = Pack::find($request->id);
        $pack->nom = $request->nom;
$pack->prix = $request->prix;
        $pack->save();
        return redirect()->route('pack.index');
    }
    public function delete($id){
        $pack = Pack::findOrFail($id);
        $pack->ImagePack()->delete();
        $pack->billet()->delete();
        $pack->composition()->delete();
        $pack->delete();
        return redirect()->route('pack.index');
    }
    public function kk($id){
        $pack = Pack::findOrFail($id);
        $composition = $pack->composition;
        //dd($composition);
        return view('pack.detail',[
            'composition' => $composition
        ]);
    }
    public function huhu(){
        return view('pack.detail');
    }
}
