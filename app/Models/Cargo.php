<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $table = 'cargos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'tipo',
        'prioridad'
    ];

    public $timestamps = false;

    public function asignaciones()
    {
        return $this->hasMany(Asignar_cargo::class);
    }

    /*public function asignaciones()
    {
        return $this->hasMany(Asignar_cargo::class, 'cargo_id', 'id');
    }*/
}
