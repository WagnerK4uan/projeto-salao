<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'data_procedimento',
        'tipo',
        'descricao_procedimento',
        'numero_secao',
        'observacao'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
