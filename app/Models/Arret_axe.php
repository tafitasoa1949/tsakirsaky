<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Arret_axe extends Model
{
     use HasFactory;
     public $timestamps = false;
     protected $table = 'arret_axe';
     protected $primaryKey = 'id';
     protected $keyType = 'string';
     protected $fillable = [
          'id', 'idaxe', 'idarret'
     ];
     public static function insert($data)
     {
          $arret_axe = new Arret_axe();
          $arret_axe->id = DB::select("SELECT gen_arret_axe_seq_id()")[0]->gen_arret_axe_seq_id;
		$arret_axe->idaxe = $data['idaxe'];
		$arret_axe->idarret = $data['idarret'];
          $arret_axe->save();
     }
     public function arret(){
        return $this->belongsTo(Arret::class,'idarret');
     }
     public function axe(){
        return $this->belongsTo(Axe::class,'idaxe');
     }
}
