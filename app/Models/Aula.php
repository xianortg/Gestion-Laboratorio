<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Equipo;

class Aula extends Model
{
    protected $fillable = [
        'nombre_sala'
    ];

    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
}