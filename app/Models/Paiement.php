<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class Paiement extends Model
{
     use HasFactory;
     public $timestamps = false;
     protected $table = 'paiement';
     protected $primaryKey = 'id';
     protected $keyType = 'string';
     protected $fillable = [
          'id', 'idresponsable', 'idclient', 'idpack', 'idmode_paiment', 'telephone', 'montant', 'reference', 'date'
     ];
     public static function insert($data)
     {
          $paiement = new Paiement();
          $paiement->id = DB::select("SELECT gen_payement_seq_id()")[0]->gen_payement_seq_id;
		$paiement->idresponsable = $data['idresponsable'];
		$paiement->idclient = $data['idclient'];
		$paiement->idpack = $data['idpack'];
		$paiement->idmode_paiment = $data['idmode_paiment'];
		$paiement->telephone = $data['telephone'];
		$paiement->montant = $data['montant'];
		$paiement->reference = $data['reference'];
		$paiement->date = $data['date'];

          $paiement->save();
     }
     public function client(){
        return $this->belongsTo(Client::class, 'idclient');
     }
     public function responsable(){
        return $this->belongsTo('App\Models\Responsable', 'idresponsable');
     }
     public function modepaiment(){
        return $this->belongsTo('App\Models\ModePaiement', 'idmode_paiment');
     }
     public function pack(){
        return $this->belongsTo('App\Models\Pack', 'idpack');
     }
     public function user(){
        return $this->belongsTo(User::class,'idresponsable');
    }
    public static function getReste($idresponsable){
        $reste = DB::table('somme_reste')->where('idresponsable', $idresponsable)->value('reste');
        return $reste;
    }
}
