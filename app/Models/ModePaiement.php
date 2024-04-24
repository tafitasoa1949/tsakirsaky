<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModePaiement extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'mode_paiment';
    protected $primaryKey = 'id';
    protected $fillable = [
         'id', 'nom'
    ];
}
