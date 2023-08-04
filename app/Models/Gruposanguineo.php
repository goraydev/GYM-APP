<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gruposanguineo extends Model
{
    protected $table = 'gruposanguineos';
    protected $fillable = ['nombre', 'created_at', 'updated_at'];
    protected $guarded = ['id'];
}
