<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Proyecto_seguimiento_sector extends Model
{
    use HasApiTokens, HasFactory;

    protected $table =  "proyecto_seguimiento_sectors";
    
    protected $fillable = [
        'id_proyecto_seguimiento',
        'id_sector'
    ];
}
