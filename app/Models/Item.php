<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    
    public $timestamps = false;
    protected $table = 'item';
    protected $primarykey = 'id';

    protected $fillable = [
        'item_descricao'
    ];

     public function belongsRegistro()
    {
        return $this->belongsTo(Registro::class);
    }

}
