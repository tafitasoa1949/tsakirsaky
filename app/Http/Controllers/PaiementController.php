<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\paiement;
use App\Http\Requests\PaiementRequest;
use App\Models\Client;
use App\Models\ModePaiement;
use App\Models\Pack;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Raw;

class PaiementController extends Controller
{
    public function create(){
        $modePaiement = ModePaiement::all();
        $users = User::all();
        $clients = Client::all();
        $packs = Pack::all();
        return view('billet.paiement.create',[
            'modePaiements'=>$modePaiement,
            'clients'=>$clients,
            'users'=>$users,
            'packs'=>$packs
        ]);
    }
    public function index(){
        $paiement = Paiement::all();
        $users = User::all();
        return view('billet.paiement.index',[
            'paiements' => $paiement,
            'users' => $users
        ]);
    }
    public function insert(PaiementRequest $request){
        $data = array(
            		'idresponsable' => $request->idresponsable,
		'idclient' => $request->idclient,
		'idpack' => $request->idpack,
		'idmode_paiment' => $request->idmode_paiment,
		'telephone' => $request->telephone,
		'montant' => $request->montant,
		'reference' => $request->reference,
		'date' => $request->date

        );
        Paiement::insert($data);
        return redirect()->route('paiement.index');
    }
    public function filtrepaiement(Request $request){
        $idresponsable = $request->input('idresponsable');
        $user = User::findOrFail($idresponsable);
        $paiements = $user->paiement()->get();
        $totalRecu = $user->paiement()
        ->select(DB::raw('sum(montant) as total_montant'))
        ->groupBy('idresponsable')
        ->get();
        $totalRecu = $totalRecu->first()->total_montant ?? 0;
        $somme_reste = Paiement::getReste($idresponsable);
        return view('billet.paiement.filtre',[
            'paiements' => $paiements,
            'totalRecu' => $totalRecu,
            'user' => $user,
            'somme_reste' => $somme_reste
        ]);
    }
}
