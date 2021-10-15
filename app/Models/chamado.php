<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chamado extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ='chamados';
    protected $fillable=['id','id_user','departamento','nome','tipo','status','data','problema', 'observacao'];


  public function user(){
        return $this->belongsTo(User::class, 'id_user');
       //return $this->belongsTo(User::class);
    }
    /*
  public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
        //return $this->hasOne('App\Models\User', 'ChavePrimaria', 'chaveLocal');
    }*/
}
