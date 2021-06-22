<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['rua', 'nr', 'complemento', 'bairro', 'cep', 'cidade', 'estado'];
    public $timestamps = false;

    public function contato()
    {
        return $this->belongsTo(Contato::class);
    }

   
}
