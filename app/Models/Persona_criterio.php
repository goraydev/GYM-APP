<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona_criterio extends Model
{
    protected $table = 'persona_criterios';

    protected $fillable = ['criterio_id','opcion_id','preinscripcion_id ','comentario', 'created_at', 'updated_at'];

    protected $guarded = ['id'];

   
    public function criterio()
    {
        return $this->belongsTo(Persona_criterio::class, 'criterio_id');
    }
    public function opcion()
    {
        return $this->belongsTo(Persona_criterio::class, 'opcion_id');
    }


    public function preinscripcion()
    {
        return $this->belongsTo('App\Models\pre_inscripcion', 'preinscripcion_id');
    }
}
