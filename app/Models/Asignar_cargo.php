<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignar_cargo extends Model
{
    use HasFactory;

    protected $table = 'asignar_cargos';
    protected $primaryKey = 'id';

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gestion()
    {
        return $this->belongsTo(Gestion::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    /*public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'id', 'cargo_id');
    }*/
}
