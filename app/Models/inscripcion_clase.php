<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inscripcion_clase extends Model
{
    protected $table = 'inscripcion_clases';
    protected $fillable = ['inscripcion_id', 'clase_id', 'dia_id','horario_id','created_at', 'updated_at'];
    protected $guarded = ['id'];

    // public function preinscripcion()
    // {
    //     return $this->belongsTo('App\Models\pre_inscripcion', 'preinscripcion_id');
    // }
    // public function inscripcion()
    // {
    //     return $this->belongsTo('App\Models\inscripcion', 'inscripcion_id');
    // }
    public function dia()
    {
        return $this->belongsTo('App\Models\Dia', 'dia_id');
    }
    public function horario()
    {
        return $this->belongsTo('App\Models\Horario', 'horario_id');
    }
    public function clase()
    {
        return $this->belongsTo('App\Models\Clase', 'clase_id');
    }
    // public function inscripcion_clases()
    // {
    //     return $this->hasMany(inscripcion::class, 'inscripcion_id');
    // }
    public function inscripcion_clases()
    {
        return $this->belongsTo('App\Models\inscripcion', 'inscripcion_id');
    }
}
