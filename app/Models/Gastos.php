<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
    protected $fillable = [
        'type',
        'value',
    ];
    use HasFactory;

    public function gastos(){
        return $this->belongsToMany(Gastos::class, 'id_usuario');
    }
}
