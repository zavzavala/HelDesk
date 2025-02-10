<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Militancia extends Model
{
    use HasFactory;

    protected $table = 'militancia';

    protected $fillable = [
        'membro_id',
        'data_ingresso',
        'situacao_membro',
        'funcao_celula',// 'Lider'
        'celula', //jovens. Velhos
    ];


    public function membro()
    {
        return $this->belongsTo(Membro::class);
    }

}
