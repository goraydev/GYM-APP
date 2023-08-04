<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    use HasFactory;
    public function inscripcion_clases()
    {
        return $this->hasMany(inscripcion_clase::class, 'dia_id');
    }

}
