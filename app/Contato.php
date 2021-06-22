<?php

namespace App;

use App\Models\Endereco;
use App\Models\Cpf;
use App\Models\Rg;
use Illuminate\Database\Eloquent\Model;

Class Contato extends Model{
   
    public $timestamps = false;
    protected $fillable = ['name', 'nr_telefone', 'cpf', 'rg' ];
    

    public function enderecos(){
        return $this->hasMany(Endereco::class);
    }


}