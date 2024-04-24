<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Arret extends Model
{
     use HasFactory;
     public $timestamps = false;
     protected $table = 'arret';
     protected $primaryKey = 'id';
     protected $keyType = 'string';
     protected $fillable = [
          'id', 'nom'
     ];
     public static function insert($data)
     {
        $arret = new Arret();
        $arret->id = DB::select("SELECT gen_arret_seq_id()")[0]->gen_arret_seq_id;
		$arret->nom = $data['nom'];
        $arret->save();
     }
     public function axe_arret(){
        return $this->hasMany(Arret_axe::class,'idarret');
     }
}
