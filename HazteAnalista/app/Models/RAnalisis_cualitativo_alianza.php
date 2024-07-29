<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RAnalisis_cualitativo_alianza extends Model
{
    use HasFactory;

    protected $table =  "r_analisis_cualitativo_alianzas";
    
    protected $fillable = [
        'id_anasis_cuali',
        'id_alianzas'
    ];
}
