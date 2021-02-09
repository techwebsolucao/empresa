<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_curso',
        'id_modulo',
        'nome_curso',
        'email',
        'status',
        'data',
        'valor',
        'slug',
        'foto'
    ];

    protected $table = 'produtos';
}
