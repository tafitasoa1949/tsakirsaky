<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    public function index(){
        $client = Client::all();
        return view('client.index', ['clients' => $client]);
        // $client = Client::find('CLT002');
        // $billets = $client->billet;
        // dd($billets);
    }
    public function create(){
        return view('client.create');
    }
    public function insert(ClientRequest $request){
        $data = array(
            		'nom' => $request->nom,
		'prenoms' => $request->prenoms,
		'telephone' => $request->telephone,
		'adresse' => $request->adresse

        );
        Client::insert($data);
        return redirect()->route('client.index');
    }
    public function update(ClientRequest $request){
        $client = Client::find($request->id);
        $client->nom = $request->nom;
        $client->prenoms = $request->prenoms;
        $client->telephone = $request->telephone;
        $client->adresse = $request->adresse;
        $client->save();
        return redirect()->route('client.index');
    }
    public function delete($id){
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('client.index');
    }
}
