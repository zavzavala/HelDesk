<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'apelido',
        'data_nascimento',
        'local_nascimento',
        'sexo',
        'estado_civil',
        'profissao',
        'habilitacoes_literarias',
        'documento_identificacao',
        'data_emissao_documento',
        'domicilio',
        'classificacao_social',
        'cartao_eleitor',
        'carta_conducao',
        'nuit'
    ];


    public function cartao(){
        return $this->hasMany(CartaoMembro::class);
    }

    public function militancia(){

        return $this->hasMany(Militancia::class);
    }
    
}
