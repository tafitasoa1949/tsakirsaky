<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\axe;
use App\Http\Requests\AxeRequest;
use App\Models\Arret;
use App\Models\Arret_axe;
use Illuminate\Support\Facades\DB;

class AxeController extends Controller
{
    public function index(){
        $axe = Axe::all();
        return view('livraison.axe.index', ['axes' => $axe]);
    }
    public function create(){
        $arrets = Arret::all();
        return view('livraison.axe.create',[
            'arrets' => $arrets
        ]);
    }
    public function insert(AxeRequest $request){
        DB::beginTransaction();
        try{
            $data = array(
                'nom' => $request->nom
            );
            $idaxe = Axe::insert($data);
            $arrets = $request->idarret;
            for($i=0 ; $i < count($arrets) ; $i++){
                $dataAxeArret = array(
                    'idaxe' => $idaxe,
                    'idarret' => $arrets[$i]
                );
                Arret_axe::insert($dataAxeArret);
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            //dd($e);
            // Vous pouvez également enregistrer l'erreur ou la renvoyer à l'utilisateur
            //return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors de l\'insertion.']);
        }

        return redirect()->route('axe.index');
    }
    public function update(AxeRequest $request){
        $axe = Axe::find($request->id);
        $axe->nom = $request->nom;
        $axe->save();
        return redirect()->route('axe.index');
    }
    public function delete($id){
        $axe = Axe::findOrFail($id);
        $axe->delete();
        return redirect()->route('axe.index');
    }
    public function detailAxe($id){
        $axe = Axe::findOrFail($id);
        $axe_arrets = $axe->axe_arret;
        return view('livraison.axe.detail',[
            'axe_arrets' => $axe_arrets
        ]);
    }
}
