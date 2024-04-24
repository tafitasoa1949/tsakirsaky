<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pack extends Model
{
    use HasFactory;
     public $timestamps = false;
     protected $table = 'pack';
     protected $primaryKey = 'id';
     protected $keyType = 'string';
     protected $fillable = [
          'id', 'nom', 'prix'
     ];
     public static function insert($data)
     {
        $pack = new Pack();
        $pack->id = DB::select("SELECT gen_pack_sequence_id()")[0]->gen_pack_sequence_id;
		$pack->nom = $data['nom'];
		$pack->prix = $data['prix'];
        $pack->save();
        return $pack->id;
     }
     public function billet()
     {
         return $this->hasMany(Billet::class,'idpack');
     }
     public function ImagePack()
    {
        return $this->hasMany(ImagePack::class, 'idpack');
    }
    public function composition(){
        return $this->hasMany(Composition::class, 'idpack');
    }
}
