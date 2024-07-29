<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RAnalisis_cuantitativo_financiamiento extends Model
{
    use HasFactory;

    protected $table =  "r_analisis_cuantitativo_financiamientos";
    
    protected $fillable = [
        'id_anasis_cuanti',
        'id_financiero'
    ];
}
