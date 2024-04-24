<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\achatmat;
use App\Http\Requests\AchatmatRequest;
use App\Models\Produit;

class AchatmatController extends Controller
{
    public function index(){
        $achatmat = Achatmat::all();
        return view('achatmat.index', ['achatmats' => $achatmat]);
    }
    public function create(){
        $produit = Produit::all();
        return view('produit.achat.index',[
            'produit' => $produit
        ]);
    }
    public function insert(AchatmatRequest $request){
        $data = array(
            'idproduit' => $request->idproduit,
		    'prix' => $request->prix,
		    'date' => $request->date
        );
        Achatmat::insert($data);
        return redirect()->route('produit.index');
    }
}
