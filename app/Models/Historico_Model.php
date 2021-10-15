<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico_Model extends Model
{
    use HasFactory;
    public $timestatmps=false;
    protected $table="historico";
    protected $fillable=['id', 'id_usuario', 'id_chamado','id_admin', 'departamento', 'status','tecnico', 'data_chamado', 'data_resolucao'];

}
