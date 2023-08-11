<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class progreso_alumno extends Model
{
    use HasFactory;
    protected $table = 'progreso_alumnos';
    protected $fillable = ['id', 'user_id', 'peso_nuevo'];
    protected $guarded = ['id'];
}
