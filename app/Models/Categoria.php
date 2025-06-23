<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'categoria';
    protected $primarykey = 'id';

    protected $fillable = [
        'cat_descricao'
    ];

     public function belongsRegistro()
    {
        return $this->belongsTo(Registro::class);
    }
}
