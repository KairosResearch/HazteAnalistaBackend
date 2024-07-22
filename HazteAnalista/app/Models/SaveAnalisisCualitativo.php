<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveAnalisisCualitativo extends Model
{
    use HasFactory;

    protected $table =  "save_analisis_cualitativos";
    
    protected $fillable = [
        'id_usuario',
        'id_caso_uso',
        'id_integrantes_equipo',
        'id_auditoria',
        'id_roadmap',
        'id_comunidad',
        'id_financiamiento',
        'id_whitepapaers',
        'id_alianzas'
    ];
}
