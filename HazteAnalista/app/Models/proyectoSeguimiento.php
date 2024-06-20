<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class proyectoSeguimiento extends Model
{
    
    use HasApiTokens, HasFactory;

    protected $table =  "proyecto_seguimiento";
    
    protected $fillable = [
        'idUsuario',
        'idProyecto',
        'id4e',
        'id_decision_proyecto',
        'marketCap',
        'idExchange',
        'idSector',
        'precioEntrada',
        'precioActual'
    ];
}
