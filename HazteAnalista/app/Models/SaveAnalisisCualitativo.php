<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveAnalisisCualitativo extends Model
{
    use HasFactory;

    protected $table =  "save_analisis_cualitativos";
    
    protected $fillable = [
        'id_usuarios',
        'id_proyecto',
        'suma'
    ];
}
