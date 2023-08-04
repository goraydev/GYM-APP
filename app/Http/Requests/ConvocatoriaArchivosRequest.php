<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConvocatoriaArchivosRequest extends FormRequest
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
            'base1'=>'nullable|mimes:pdf|max:30000',

            'base2'=>'nullable|mimes:pdf|max:30000',
            'base3'=>'nullable|mimes:pdf|max:30000',

            'resultado1'=>'nullable|mimes:pdf|max:30000',
            'resultado2'=>'nullable|mimes:pdf|max:30000',
            'resultado3'=>'nullable|mimes:pdf|max:30000',
            'resultado4'=>'nullable|mimes:pdf|max:30000',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function($validator) {

            // dd($validator->errors());
            $convoca=$this->convocatoria;

            if ($validator->errors()->count()>0) {
                $validator->errors()->add('archivo', "#archivos".$convoca->id);
            }else{

                if (empty($convoca->base1) && !request()->hasFile('base1')) {
                    $validator->errors()->add('base1', "el archivo de base es obligatorio");
                    $validator->errors()->add('archivo', "#archivos".$convoca->id);
                }else{
                    $this->cargar_archivo('base2');
                    $this->cargar_archivo('base3');
                    $this->cargar_archivo('resultado1');
                    $this->cargar_archivo('resultado2');
                    $this->cargar_archivo('resultado3');
                    $this->cargar_archivo('resultado4');
                }
               
            }

        });
    }

    public function cargar_archivo($nombre){
        // $cargar = (boolean)request()->has($nombre.'_cargar');
        // // $this->request->parameters[]=[$nombre.'_cargar', $cargar];
        // $nom=$nombre.'_cargar';
        // dd(request());
        // request()->set([ $nom=> $cargar]);

        // request()->request->add([ $nom, $cargar]);
        // request()->request->add([ $nom=> $cargar]);
        // request()->request->add([ => ]);
    }

    // public function validar_archivo($validator, $convoca){
    //   $carga=(boolean)  request()->request('base2_cargar');
    //     if ($carga) {
    //         # code...
    //     }
        
    // }
}
