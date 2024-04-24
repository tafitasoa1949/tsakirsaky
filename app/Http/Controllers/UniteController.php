<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\unite;
use App\Http\Requests\UniteRequest;

class UniteController extends Controller
{
    public function index(){
        $unite = Unite::all();
        return view('unite.index', ['unites' => $unite]);
    }
    public function create(){
        return view('unite.create');
    }
    public function insert(UniteRequest $request){
        $data = array(
            		'nom' => $request->nom

        );
        Unite::insert($data);
        return redirect()->route('unite.index');
    }
    public function update(UniteRequest $request){
        $unite = Unite::find($request->id);
        $unite->nom = $request->nom;
        $unite->save();
        return redirect()->route('unite.index');
    }
    public function delete($id){
        $unite = Unite::findOrFail($id);
        $unite->delete();
        return redirect()->route('unite.index');
    }
}
