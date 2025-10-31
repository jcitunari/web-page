<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'ci',
        'nombre',
        'apPaterno',
        'apMaterno',
        'fechaNacimiento',
        'fechaJuramento',
        'profesion',
        'presentacion',
        'intereses',
        'puntosAMejorar',
        'foto',
        'curriculum',
        'celular',
        'email',
        'password',
        'rol',
        'facebook',
        'instagram',
        'linkedin',
        'twitter',
        'tiktok',
        'web'
    ];

    public $timestamps = false;

    public function contactos()
    {
        return $this->hasMany(Contacto::class, 'user_id', 'id');
    }

    public function asignaciones()
    {
        return $this->hasMany(Asignar_cargo::class);
    }

    public function proyectos()
    {
        return $this->hasMany(Asignar_proyecto::class);
    }
    /*public function gestiones()
    {
        return $this->belongsToMany(Gestion::class,'asignar_cargos','user_id','gestion_id');
    }*/

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //Mutadores y accesores para nombre
    /*protected function nombre():Attribute{
        return new Attribute(
            get: fn($value) => ucwords($value),
            set: fn($value) => strtolower($value)
        );
    }
    protected function apPaterno():Attribute{
        return new Attribute(
            get: fn($value) => ucwords($value),
            set: fn($value) => strtolower($value)
        );
    }
    protected function apMaterno():Attribute{
        return new Attribute(
            get: fn($value) => ucwords($value),
            set: fn($value) => strtolower($value)
        );
    }*/

}
