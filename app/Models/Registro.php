<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $table = 'registro';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'categoria',
        'item',
        'nota_fiscal',
        'data_aquisicao',
        'local',
        'serial',
        'modelo',
        'marca',
        'observacao'
    ];

    public function hasCategoria()
    {
        return $this->hasOne(Categoria::class, 'id', 'categoria');
    }

    public function hasItem()
    {
        return $this->hasOne(Item::class, 'id', 'item');
    }

    public function hasLocal()
    {
        return $this->hasOne(Local::class, 'id', 'local');
    }
}
