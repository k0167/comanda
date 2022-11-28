<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComandaProduto extends Model
{
    use HasFactory;
    public $incrementing = true;
    protected $table = 'comanda_produto';
    public $timestamps = true;

    protected $fillable = [
        'id_produto',
        'id_comanda',
        'valor',
        'qtde',
        'valor_pago',
    ];
}
