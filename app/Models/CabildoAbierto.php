<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabildoAbierto extends Model
{
    use HasFactory;
    protected $table = 'cabildo_abierto';
    public function name_department()
    {
        return $this->hasOne(Departamento::class,'id', 'dep_id');
    }
}
