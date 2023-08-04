<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'provincias';
    protected $fillable = ['nombre', 'departamento_id', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

    public function distritos(){
        return $this->hasMany(Distrito::class);
    }
}
