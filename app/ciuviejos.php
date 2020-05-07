<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ciuviejos extends Model
{
    protected $table = 'ciuviejos';
    protected $fillable = ['orden', 'fecha', 'desde', 'hasta', 'nombre', 'comercio', 'actividad', 'direccion', 'legajo', 'previa', 'alta', 'hoy', 'borrado', 'lugar','certificado'];
}
