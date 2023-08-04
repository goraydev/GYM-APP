<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class OperacionRequest extends FormRequest
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
            'responsable' => ['required', 'string', 'unique:operacions,responsable'],
            'celular' => ['required', 'string', 'unique:operacions,celular'],
            'equipo_id' => ['required', 'string', 'unique:operacions,equipo_id'],
            'fecha_devolucion'=>'required|date|after:'.date('Y-m-d H:i:s'),
            
          ];
    }
    public function withValidator($validator)
    {
        $validator->after(function($validator) {
            if($validator->errors()->count()) {
                if(!in_array($this->method(), ['PUT', 'PATCH'])) {
                    $validator->errors()->add('post', true);
                }
            }
        });
    }
}
