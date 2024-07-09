<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = ['dni', 'nombre', 'apellido', 'email'];

    public function altas()
    {
        return $this->hasMany(Alta::class);
    }
}