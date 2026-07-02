<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aula; 

class Equipo extends Model
{
    protected $fillable = [
        'nombre',
        'numero_serie',
        'descripcion',
        'imagen_ruta',
        'aula_id'
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}