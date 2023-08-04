<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inscripcion extends Model
{
    protected $table = 'inscripcions';
    protected $fillable = ['n_recibo','monto','fecha_inicio','estado','preinscripcion_id', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

    public function preinscripcion()
    {
        return $this->belongsTo('App\Models\pre_inscripcion', 'preinscripcion_id');
    }
    public function inscripciones()
    {
        return $this->hasMany(inscripcion_clase::class, 'inscripcion_id');
    }
}
