<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartaoMembro extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'membro_id',
        'numero',
        'data_emissao',
    ];

    public function membro()
    {
        return $this->belongsTo(Membro::class);
    }
}
