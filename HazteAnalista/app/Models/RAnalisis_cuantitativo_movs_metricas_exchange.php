<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RAnalisis_cuantitativo_movs_metricas_exchange extends Model
{
    use HasFactory;

    protected $table =  "r_analisis_cuantitativo_movs_metricas_exchanges";
    
    protected $fillable = [
        'id_anasis_cuanti',
        'id_metrics_exchange'
    ];
}
