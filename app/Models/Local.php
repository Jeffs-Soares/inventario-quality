<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'local';
    protected $primarykey = 'id';

    protected $fillable = [
        'loc_descricao'
    ];

     public function belongsRegistro()
    {
        return $this->belongsTo(Registro::class);
    }
}
