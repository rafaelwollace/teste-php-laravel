<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VagaCandidato extends Model
{
    use HasFactory;
    protected $table = 'vaga_candidatos';

    protected $fillable = [
        'fk_vagas',
        'fk_users'
    ];

    public $timestamps = true;
}