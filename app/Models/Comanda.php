<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    use HasFactory;
    protected $table = 'comanda';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'nome',
        'valor_total',
        'desconto',
    ];
    public function Produtos()
    {
        return $this->belongsToMany(Produto::class,'comanda_produto');
    }
}
