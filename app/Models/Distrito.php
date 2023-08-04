<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table = 'distritos';
    protected $fillable = ['nombre', 'provincia_id', 'created_at', 'updated_at'];
    protected $guarded = ['id'];
}
