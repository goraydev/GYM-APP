<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Postulante;
use App\Models\Convocatoria;
class PostulanteCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dni' => 'required|digits:8',
            'nombres' => 'required|min:4|max:200',
            'apellidos' => 'required|min:4|max:200',
            'correo' => 'required|min:4|max:200',
            'archivo' => 'nullable|mimes:pdf|max:30000',
          ];
    }
    public function withValidator($validator)
    {
        $validator->after(function($validator) {
            if($validator->errors()->count()) {
                if(!in_array($this->method(), ['PUT', 'PATCH'])) {
                    $validator->errors()->add('post', true);
                }
            }else{
                if ($this->method()=='POST') {

                    if (!$this->hasFile('archivo')) {
                        $validator->errors()->add('archivo', 'Este campo es obligatorio');
                        $validator->errors()->add('post', true);
                    }

                    $postula = $this->convocatoria->postulantes
                    ->where('correo','=',$this->correo)->first();

                   // dd($this->convocatoria,$this->convocatoria->postulantes);
                    if(!empty($postula)){
                        $validator->errors()->add('correo', 'este correo ya se encuentra registrado');
                        $validator->errors()->add('post', true);
                    }

                    $postula = $this->convocatoria->postulantes
                    ->where('ndocumento',$this->dni)->first();

                    if(!empty($postula)){
                        $validator->errors()->add('dni', 'Este DNI ya se encuentra registrado');
                        $validator->errors()->add('post', true);
                    }
                    
                }
            }
        });
    }
}
