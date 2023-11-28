<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'type_document' => 'required|string',
            'number_document' => 'required|string',
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',

        ];
    }

    public function messages(): array
    {
        return [
            'type_document.required' => 'El tipo de documento es requerido',
            'number_document.required' => 'El numero de documento es requerido',
            'name.required' => 'El nombre es requerido',
            'phone.required' => 'El numero de telefono es requerido',
            'mail.required' => 'El correo es requerido',

        ];
    }
}
