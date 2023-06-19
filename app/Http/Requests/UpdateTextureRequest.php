<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTextureRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => ["required", "unique:textures,name,{$this->texture->id}", "max:100"]
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Il nome della texture è obbligatorio",
            "name.unique" => "Questa texture è già presente nel database",
            "name.max" => "Il nome della texture non può superare i 100 caratteri"
        ];
    }
}
