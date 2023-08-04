<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class ConvocatoriaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return[
            'id'=>(Integer)$this->id,
            'titulo'=>$this->titulo,
            'tipo'=>$this->tipo,
            'activo'=>$this->tipo,
            'etapa'=>$this->calcularEtapa(),
        ];

    }

    public function calcularEtapa(){
        return 'hola';
    }
}
