<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    protected $table = 'semestres';
    protected $fillable = ['semestre', 'activo','created_at', 'updated_at'];
    protected $guarded = ['id'];
}
