<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            		'nom' => 'required',
		'prenoms' => 'required',
		'telephone' => 'required',
		'adresse' => 'required'

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
            		'nom.required' => 'Le champ nom est obligatoire.',
		'prenoms.required' => 'Le champ prenoms est obligatoire.',
		'telephone.required' => 'Le champ telephone est obligatoire.',
		'adresse.required' => 'Le champ adresse est obligatoire.'
        ];
    }
}
