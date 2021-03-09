<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    protected $fillable = [
        'method',
        'value',
    ];
    use HasFactory;
    
    public function vendas(){
        return $this->belongsToMany(Vendas::class, 'id_usuario');
    }
}
