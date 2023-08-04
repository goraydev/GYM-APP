<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $table = 'escuelas';
    protected $fillable = ['nombre', 'facultad_id', 'created_at', 'updated_at'];
    protected $guarded = ['id'];
}
