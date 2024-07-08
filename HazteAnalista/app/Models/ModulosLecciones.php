<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class ModulosLecciones extends Model
{
    use HasApiTokens, HasFactory;

    protected $table =  "modulos_lecciones";

}
