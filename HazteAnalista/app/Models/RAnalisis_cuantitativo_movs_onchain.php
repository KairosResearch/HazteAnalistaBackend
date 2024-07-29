<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RAnalisis_cuantitativo_movs_onchain extends Model
{
    use HasFactory;

    protected $table =  "r_analisis_cuantitativo_movs_onchains";
    
    protected $fillable = [
        'id_anasis_cuanti',
        'id_movs_onchain'
    ];
}
