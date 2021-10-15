<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resolve_chamados extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table ='resolve_chamados';
 
    protected $fillable=['id','id_Rchamados','id_user','departamento','nome','tipo','status','data','problema', 'observacao'];
    
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
       //return $this->belongsTo(User::class);
    }
}
