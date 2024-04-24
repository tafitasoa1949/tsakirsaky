<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaiementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            		'idresponsable' => 'required',
		'idclient' => 'required',
		'idpack' => 'required',
		'idmode_paiment' => 'required',
		'telephone' => 'required',
		'montant' => 'required',
		'reference' => 'required',
		'date' => 'required'

        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            		'idresponsable.required' => 'Le champ idresponsable est obligatoire.',
		'idclient.required' => 'Le champ idclient est obligatoire.',
		'idpack.required' => 'Le champ idpack est obligatoire.',
		'idmode_paiment.required' => 'Le champ idmode_paiment est obligatoire.',
		'telephone.required' => 'Le champ telephone est obligatoire.',
		'montant.required' => 'Le champ montant est obligatoire.',
		'reference.required' => 'Le champ reference est obligatoire.',
		'date.required' => 'Le champ date est obligatoire.'
        ];
    }
}
