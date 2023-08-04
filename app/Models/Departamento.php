<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';
    protected $fillable = ['nombre', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

    public function provincias(){
        return $this->hasMany(Provincia::class);
    }
}
