<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vagas extends Model
{
    use HasFactory;
    protected $table = 'vagas';

    protected $fillable = [
        'titulo_vaga',
        'descricao_vaga',
        'status_vaga',
        'tipo_vaga'
    ];

    public $timestamps = true;
}