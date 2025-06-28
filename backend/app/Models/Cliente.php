<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'cpf', 'data_nascimento', 'profissao', 'celular'
    ];

    public function procedimentos()
    {
        return $this->hasMany(Procedimento::class);
    }
}