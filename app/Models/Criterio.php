<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criterio extends Model
{
    protected $table = 'criterios';
    protected $fillable = ['nombre', 'activo', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

    public function personas_criterios()
    {
        return $this->hasMany(Persona_criterio::class, 'criterio_id');
    }
}
