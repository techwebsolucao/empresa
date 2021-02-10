<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatorios extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'quantidade',
        'id_produto',
        'data',
        'opcao'
    ];

    public $timestamps = false;
    protected $table = 'relatorios';
}
