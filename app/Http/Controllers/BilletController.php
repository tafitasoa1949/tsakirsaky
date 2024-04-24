<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\billet;
use App\Http\Requests\BilletRequest;
use App\Models\Axe;
use App\Models\Client;
use App\Models\ModePaiement;
use App\Models\Pack;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class BilletController extends Controller
{
    public function index(){
        $billets = Billet::all();
        // dd($billets->client);
        $clients = Client::all();
        return view('billet.index',[
            'billets' => $billets,
            'clients' => $clients
        ]);
    }
    public function create(){
        $clients = Client::all();
        $packs = Pack::all();
        $users = User::all();
        $axes = Axe::all();
        return view('billet.create',[
            'clients' => $clients,
            'packs' => $packs,
            'users' => $users,
            'axes' => $axes
        ]);
    }
    public function insert(BilletRequest $request){
        $data = array(
            		'idclient' => $request->idclient,
		'idresponsable' => $request->idresponsable,
		'idpack' => $request->idpack,
        'idaxe' => $request->idaxe,
		'quantite' => $request->quantite,
		'date' => $request->date

        );
        Billet::insert($data);
        return redirect()->route('billet.index');
    }
    public function update(BilletRequest $request){
        $billet = Billet::find($request->id);
        $billet->idclient = $request->idclient;
        $billet->idresponsable = $request->idresponsable;
        $billet->idpack = $request->idpack;
        $billet->idaxe = $request->idaxe;
        $billet->quantite = $request->quantite;
        $billet->date = $request->date;
        $billet->save();
        return redirect()->route('billet.index');
    }
    public function delete($id){
        $billet = Billet::findOrFail($id);
        $billet->delete();
        return redirect()->route('billet.index');
    }
    public function filtreBillet(Request $request){
        $idclient = $request->input('idclient');
        $clients = Client::findOrFail($idclient);
        $billets = $clients->billet;
        $TotalbilletsPaPack = $clients->billet()
        ->select('idpack', DB::raw('sum(quantite) as total_quantite'))
        ->groupBy('idpack')
        ->get();
        $totalQuantite = $clients->billet()->sum('quantite');
        return view('billet.filtre',[
            'billets'=>$billets,
            'TotalbilletsPaPack'=>$TotalbilletsPaPack,
            'total_quantite'=>$totalQuantite
        ]);
    }
    public function facturer($id){
        $billet = Billet::findOrFail($id);
        $montant = $billet->quantite*$billet->pack->prix;
        $data = array(
            'billet' => $billet,
            'montant' => $montant
        );
        $pdf = PDF::loadView('billet.pdf',$data);
        return $pdf->download('Facture.pdf');
    }
    public function bilan(){
        $bilan = Billet::getVenteParPack();
        return view('billet.bilan',[
            'bilan' => $bilan
        ]);
    }
    public function statistique(){
        $bilan = Billet::getVenteParPack();
        return view('billet.statistique',[
            '$bilan' => $bilan
        ]);
    }
}
