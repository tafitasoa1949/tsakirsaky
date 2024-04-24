<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Billet extends Model
{
    use HasFactory;
     public $timestamps = false;
     protected $table = 'billet';
     protected $primaryKey = 'id';
     protected $keyType = 'string';
     protected $fillable = [
          'id', 'idclient', 'idresponsable', 'idpack', 'quantite', 'date'
     ];
     public static function insert($data)
     {
            $billet = new Billet();
            $billet->id = DB::select("SELECT gen_billet_seq_id()")[0]->gen_billet_seq_id;
            $billet->idclient = $data['idclient'];
            $billet->idresponsable = $data['idresponsable'];
            $billet->idpack = $data['idpack'];
            $billet->idaxe = $data['idaxe'];
            $billet->quantite = $data['quantite'];
            $billet->date = $data['date'];

          $billet->save();
     }
    public function client()
    {
        return $this->belongsTo(Client::class,'idclient');
    }
    public function pack()
    {
        return $this->belongsTo(Pack::class,'idpack');
    }
    public function user(){
        return $this->belongsTo(User::class,'idresponsable');
    }
    public function axe(){
        return $this->belongsTo(Axe::class,'idaxe');
    }
    public static function getVenteParPack() {
        $result = DB::table('vente_par_pack')->get();
        return $result;
    }
}
