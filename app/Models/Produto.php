<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produto';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'nome',
        'valor',
    ];

    public function Comandas()
    {
        return $this->belongsToMany(Comanda::class,'comanda_produto');
    }
}
