<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    use HasFactory;
     public $timestamps = false;
     protected $table = 'client';
     protected $primaryKey = 'id';
     protected $keyType = 'string';
     protected $fillable = [
          'id', 'nom', 'prenoms', 'telephone', 'adresse'
     ];
     public static function insert($data)
     {
          $client = new Client();
          $client->id = DB::select("SELECT gen_client_sequence_id()")[0]->gen_client_sequence_id;
		$client->nom = $data['nom'];
		$client->prenoms = $data['prenoms'];
		$client->telephone = $data['telephone'];
		$client->adresse = $data['adresse'];

          $client->save();
     }
     public function billet()
     {
         return $this->hasMany(Billet::class,'idclient');
     }
     public function paiement(){
        return $this->hasMany(Paiement::class,'idclient');
     }
}
