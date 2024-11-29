<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersWallets extends Model
{
    use HasFactory;

    protected $table =  "users_wallets";
    protected $fillable = [
        'id_usuarios',
        'wallet',
    ];
}
