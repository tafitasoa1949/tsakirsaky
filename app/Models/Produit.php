<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produit extends Model
{
    use HasFactory;
     public $timestamps = false;
     protected $table = 'produit';
     protected $primaryKey = 'id';
     protected $keyType = 'string';
     protected $fillable = [
          'id', 'nom', 'idunite'
     ];
     public static function insert($data)
     {
        $produit = new Produit();
        $produit->id = DB::select("SELECT gen_produit_seq_id()")[0]->gen_produit_seq_id;
        $produit->nom = $data['nom'];
        $produit->idunite = $data['idunite'];

        $produit->save();
     }
     public function unite(){
        return $this->belongsTo(Unite::class, 'idunite');
     }
     public function paiement(){
        return $this->hasMany(Paiement::class, 'idproduit');
     }
}
