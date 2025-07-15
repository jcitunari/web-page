<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    use HasFactory;

    protected $table = 'gestions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'anio'
    ];

    public $timestamps = false;

    public function asignaciones()
    {
        return $this->hasMany(Asignar_cargo::class);
    }

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }

    /*public function users()
    {
        return $this->belongsToMany(User::class,'asignar_cargos','gestion_id','user_id');
    }*/
}
