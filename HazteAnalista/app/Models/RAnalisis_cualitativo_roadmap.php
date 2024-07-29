<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RAnalisis_cualitativo_roadmap extends Model
{
    use HasFactory;

    protected $table =  "r_analisis_cualitativo_roadmaps";
    
    protected $fillable = [
        'id_anasis_cuanti',
        'id_roadmap'
    ];
}
