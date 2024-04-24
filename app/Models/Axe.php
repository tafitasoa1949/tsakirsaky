<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Axe extends Model
{
     use HasFactory;
     public $timestamps = false;
     protected $table = 'axe';
     protected $primaryKey = 'id';
     protected $keyType = 'string';
     protected $fillable = [
          'id', 'nom'
     ];
     public static function insert($data)
     {
        $axe = new Axe();
        $axe->id = DB::select("SELECT gen_axe_seq_id()")[0]->gen_axe_seq_id;
		$axe->nom = $data['nom'];
        $axe->save();
        return $axe->id ;
     }
     public function axe_arret(){
        return $this->hasMany(Arret_axe::class,'idaxe');
     }
     public function billet()
     {
         return $this->hasMany(Billet::class,'idaxe');
     }
}
