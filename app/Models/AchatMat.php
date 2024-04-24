<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Achatmat extends Model
{
     use HasFactory;
     public $timestamps = false;
     protected $table = 'achatmat';
     protected $primaryKey = 'id';
     protected $keyType = 'string';
     protected $fillable = [
          'id', 'idproduit', 'prix', 'date'
     ];
     public static function insert($data)
     {
            $achatmat = new Achatmat();
            $achatmat->id = DB::select("SELECT gen_achat_seq_id()")[0]->gen_achat_seq_id;
            $achatmat->idproduit = $data['idproduit'];
            $achatmat->prix = $data['prix'];
            $achatmat->date = $data['date'];
            $achatmat->save();
     }
}
