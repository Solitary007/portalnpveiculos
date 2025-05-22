<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;

    protected $fillable = [
        'observacao', 'ipva', 'lic', 'chave', 'loja', 'tipo_estoque', 'situacao', 'vistoria_cautelar',
        'modelo', 'marca', 'cor', 'cbl', 'fab_ano', 'placa', 'fipe', 'custo', 'ga', 'venda',
        'preco_oferta', 'km', 'origem', 'est_venda', 'data_entrada', 'nota_fiscal'
    ];
}