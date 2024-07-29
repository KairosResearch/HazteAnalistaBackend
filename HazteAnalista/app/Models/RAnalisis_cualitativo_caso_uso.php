<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RAnalisis_cualitativo_caso_uso extends Model
{
    use HasFactory;

    protected $table =  "r_analisis_cualitativo_caso_usos";
    
    protected $fillable = [
        'id_anasis_cuali',
        'id_caso_uso'
    ];
}
