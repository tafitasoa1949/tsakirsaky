<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagePack extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'image';
    protected $primaryKey = 'id';
    protected $fillable = [
         'id', 'idpack', 'path'
    ];
    public function pack()
    {
        return $this->belongsTo(Pack::class,'idpack');
    }
}
