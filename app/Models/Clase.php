<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;
    public function inscripcion_clases()
    {
        return $this->hasMany(inscripcion_clase::class, 'clase_id');
    }

}
