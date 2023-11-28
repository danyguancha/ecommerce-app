<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'fk_category_id' => ['required','integer'],
            'code' => 'required|string',
            'name' => ['required','string','max:255'],
            'price'=> ['required','string','max:255'],
            'stock' => ['required','integer'],
            'description' => ['required','string','max:255'],
            'image' => ['required','string','max:255'],
            'estado' => ['required','string','max:255'],
        ];
    }

    public function messages():array
    {
        return [
            'fk_category_id.required' => 'El campo categoria es requerido',
            'code.required' => 'El campo codigo es requerido',
            'name.required' => 'El campo nombre es requerido',
            'name.string' => 'El campo nombre debe ser una cadena de texto',
            'price.required' => 'El campo precio es requerido',
            'price.string' => 'El campo precio debe ser una cadena de texto',
            'stock.required' => 'El campo stock es requerido',
            'description.required' => 'El campo descripcion es requerido',
            'image.required' => 'El campo imagen es requerido',
            'estado.required' => 'El campo estado es requerido',

        ];
    }
}
