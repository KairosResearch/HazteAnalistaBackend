<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    use HasFactory;

    protected $table =  "proyectos";
    
    protected $fillable = [
        'id',
        'proyecto',
        'ticker',
        'descripcion',
        'website',
        'link_analisis_kairos',
        'documentacion',
        'twitter',
        'github',
        'discord',
        'ultima_ronda',
        'financiamiento',
        'inversionista1',
        'inversionista2',
        'inversionista3',
        'status'
    ];
}
