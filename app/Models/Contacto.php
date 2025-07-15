<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $table = 'contactos';
    protected $primaryKey = 'id';
    protected $fillable = ['plataforma', 'enlace'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
