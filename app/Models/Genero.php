<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = 'generos';
    protected $fillable = ['nombre', 'created_at', 'updated_at'];
    protected $guarded = ['id'];
}
