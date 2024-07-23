<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveAnalisisCuantitativo extends Model
{
    use HasFactory;

    protected $table =  "save_analisis_cuantitativos";
    
    protected $fillable = [
        'id_usuario',
        'id_proyecto',
        'id_tokenomic',
        'id_movimientosOnChain',
        'id_metricasExchage',
        'id_financiamitos'
    ];
}
