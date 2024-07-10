<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class UltimasLecciones extends Model
{
    use HasApiTokens, HasFactory;

    protected $table =  "ultimas_lecciones";
    protected $fillable = [
        'id_usuario',
        'id_modulo',
        'id_leccion',
        'fecha'        
    ];

}
