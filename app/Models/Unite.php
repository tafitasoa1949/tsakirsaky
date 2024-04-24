<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Unite extends Model
{
    use HasFactory;
     public $timestamps = false;
     protected $table = 'unite';
     protected $primaryKey = 'id';
     protected $fillable = [
          'id', 'nom'
     ];
     public static function insert($data)
     {
        $unite = new Unite();
		$unite->nom = $data['nom'];
        $unite->save();
     }
     public function produit(){
        return $this->hasMany(Produit::class, 'idunite');
     }
}
