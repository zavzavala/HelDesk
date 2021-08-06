<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chamado extends Model
{
    use HasFactory;

    protected $table ='chamados';
    protected $fillable=['id','id_user','nome','tipo','status','data','problema'];


     /* public function user(){
        return $this->hasMany(User::class);
    }*/
  public function user()
    {
        return $this->hasMany('App\Models\User', 'id', 'id_user');
        //return $this->hasOne('App\Models\User', 'ChavePrimaria', 'chaveLocal');
    }
}
