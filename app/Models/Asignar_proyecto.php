<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Asignar_proyecto extends Model
{
    use HasFactory;

    protected $table = 'asignar_proyectos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'rol'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }
}
