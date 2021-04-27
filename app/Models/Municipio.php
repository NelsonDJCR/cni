<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $table = "municipio";
    protected $fillable = [
        "nombre",
        "estado",
        "usuario_creador",
        "dep_id"
    ];
}
