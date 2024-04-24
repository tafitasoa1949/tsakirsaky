<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BilletRequest extends FormRequest
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
            		'idclient' => 'required',
		'idresponsable' => 'required',
		'idpack' => 'required',
        'idaxe' => 'required',
		'quantite' => 'required',
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
            		'idclient.required' => 'Le champ idclient est obligatoire.',
		'idresponsable.required' => 'Le champ idresponsable est obligatoire.',
		'idpack.required' => 'Le champ idpack est obligatoire.',
        'idaxe.required' => 'Le champ axe est obligatoire.',
		'quantite.required' => 'Le champ quantite est obligatoire.',
		'date.required' => 'Le champ date est obligatoire.'
        ];
    }
}
