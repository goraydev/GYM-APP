<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
    protected $table = 'opcions';
    protected $fillable = ['nombre', 'activo', 'created_at', 'updated_at'];
    protected $guarded = ['id'];


    public function personas_criterios()
    {
        return $this->hasMany(Persona_criterio::class, 'opcion_id');
    }
}
