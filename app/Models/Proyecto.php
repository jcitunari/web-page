<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyectos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'tipo',
        'objetivoGeneral',
        'objetivosEspecificos',
        'ciudad',
        'fechaInicio',
        'fechaFin',
        'ejecucion',
        'resumen',
        'fotoPrincipal',
        'fotoPortada',
        'informe',
    ];

    public $timestamps = false;

    public function gestion()
    {
        return $this->belongsTo(Gestion::class);
    }

    public function asignaciones()
    {
        return $this->hasMany(Asignar_proyecto::class);
    }

    protected function ejecucion():Attribute{
        return new Attribute(
            //get: fn($value) => ucwords($value),
            //set: fn($value) => nl2br($value),
            set: fn($value) => str_replace(array("\r\n", "\r", "\n"), "<br />", $value)
        );
    }
    protected function objetivoGeneral():Attribute{
        return new Attribute(
            set: fn($value) => str_replace(array("\r\n", "\r", "\n"), "<br />", $value)
            //set: fn($value) => nl2br($value)
        );
    }
    protected function objetivosEspecificos():Attribute{
        return new Attribute(
            set: fn($value) => str_replace(array("\r\n", "\r", "\n"), "<br />", $value)
            //set: fn($value) => nl2br($value)
        );
    }
    
}
