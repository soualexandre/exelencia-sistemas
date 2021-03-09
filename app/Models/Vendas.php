<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    protected $fillable = [
        'method',
        'value',
        'date',
    ];
    use HasFactory;
    
    public function vendas(){
        return $this->belongsToMany(Vendas::class, 'id_usuario');
    }
}
