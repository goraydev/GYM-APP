<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultads';
    protected $fillable = ['nombre', 'abrev', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

    public function escuelas(){
        return $this->hasMany(Escuela::class);
    }
}
