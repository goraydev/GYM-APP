<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registro_asistencia extends Model
{
    use HasFactory;
    protected $table = 'registro_asistencias';
    protected $fillable = ['id', 'user_id', 'control_id', 'fecha_hora_registro'];
    protected $guarded = ['id'];
}
