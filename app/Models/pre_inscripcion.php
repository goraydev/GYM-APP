<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pre_inscripcion extends Model
{
    protected $table = 'pre_inscripcions';
    protected $fillable = ['dni','nombres','apellidos','f_nacimiento','edad','celular','domicilio','oficina','activo','genero_id','distrito_id','escuela_id', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

   
    public function generos()
    {
        return $this->belongsTo('App\Models\Genero', 'genero_id');
    }

    public function facultades()
    {
        return $this->belongsTo('App\Models\Facultad', 'facultad_id');
    }
    public function escuelas()
    {
        return $this->belongsTo('App\Models\Escuela', 'escuela_id');
    }
    public function departamentos()
    {
        return $this->belongsTo('App\Models\Departamento', 'departamento_id');
    }
    public function provincias()
    {
        return $this->belongsTo('App\Models\Pronvincia', 'provincia_id');
    }
    public function distritos()
    {
        return $this->belongsTo('App\Models\Distrito', 'distrito_id');
    }
    public function semestres()
    {
        return $this->belongsTo('App\Models\Semestre', 'semestre_id');
    }
    public function gruposanguineos()
    {
        return $this->belongsTo('App\Models\Gruposanguineo', 'gruposanguineo_id');
    }
    public function factor_rhs()
    {
        return $this->belongsTo('App\Models\FactorRh', 'factorRh_id');
    }

    public function personas_criterios()
    {
        return $this->hasMany(Persona_criterio::class, 'preinscripcion_id');
    }
}
