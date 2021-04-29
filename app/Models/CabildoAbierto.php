<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabildoAbierto extends Model
{
    use HasFactory;
    protected $table = 'cabildo_abierto';
    public function departamento()
    {
        return $this->hasOne(Departamento::class,'id', 'dep_id');
    }
    public function municipio()
    {
        return $this->hasOne(Municipio::class,'id','mun_id');
    }
}
