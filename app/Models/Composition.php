<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Composition extends Model
{
    use HasFactory;
     public $timestamps = false;
     protected $table = 'composition';
     protected $primaryKey = 'id';
     protected $keyType = 'string';
     protected $fillable = [
          'id', 'idpack', 'idproduit', 'quantite'
     ];
     public static function insert($data)
     {
          $composition = new Composition();
          $composition->id = DB::select("SELECT gen_compo_pack_seq_id()")[0]->gen_compo_pack_seq_id;
            $composition->idpack = $data['idpack'];
            $composition->idproduit = $data['idproduit'];
            $composition->quantite = $data['quantite'];
          $composition->save();
     }
     public function pack(){
        return $this->belongsTo(Pack::class, 'idpack');
     }
     public function produit(){
        return $this->belongsTo(Produit::class, 'idproduit');
     }
}
