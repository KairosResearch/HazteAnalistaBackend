<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Lecciones extends Model
{
    use HasApiTokens, HasFactory;

    protected $table =  "lecciones";
    
    protected $fillable = [
        'id_modulo',
        'numero_leccion',
        'leccion',
        'html_portada',
        'html_leccion',
        'status'
    ];
}
