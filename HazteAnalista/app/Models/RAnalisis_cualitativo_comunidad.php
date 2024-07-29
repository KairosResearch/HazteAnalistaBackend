<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RAnalisis_cualitativo_comunidad extends Model
{
    use HasFactory;

    protected $table =  "r_analisis_cualitativo_comunidads";
    
    protected $fillable = [
        'id_anasis_cuali',
        'id_comunidades'
    ];
}
