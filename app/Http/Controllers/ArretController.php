<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\arret;
use App\Http\Requests\ArretRequest;

class ArretController extends Controller
{
    public function index(){
        $arret = Arret::all();
        return view('livraison.arret.index', ['arrets' => $arret]);
    }
    public function create(){
        return view('livraison.arret.create');
    }
    public function insert(ArretRequest $request){
        $data = array(
		'nom' => $request->nom
        );
        Arret::insert($data);
        return redirect()->route('arret.index');
    }
    public function update(ArretRequest $request){
        $arret = Arret::find($request->id);
$arret->nom = $request->nom;
        $arret->save();
        return redirect()->route('arret.index');
    }
    public function delete($id){
        $arret = Arret::findOrFail($id);
        $arret->delete();
        return redirect()->route('arret.index');
    }
}
