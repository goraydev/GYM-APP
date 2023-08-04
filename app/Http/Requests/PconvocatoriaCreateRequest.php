<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class PconvocatoriaCreateRequest extends FormRequest
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
            'titulo'=>'required|min:10,max:500',
            'sudependencia_id'=>'required|exists:subdependencias,id',
            'tipocontrato_id'=>['required',
                                Rule::in(['1', '2']),   
                            ],
            'fecha_apertura'=>'required|date|after:'.date('Y-m-d H:i:s'),
            'fecha_evaluacion'=>'required|date|after:fecha_apertura',
            'fecha_finaliza'=>'required|date|after:fecha_evaluacion',
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
