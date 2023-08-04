<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactorRh extends Model
{
    protected $table = 'factor_rhs';
    protected $fillable = ['nombre', 'created_at', 'updated_at'];
    protected $guarded = ['id'];
}
