<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Brand;

class UpdateBrandRequest extends FormRequest
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
            "name" => ["required", "unique:brands,name,{$this->brand->id}", "max:100"]
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Il nome del brand è obbligatorio",
            "name.unique" => "Questo brand è già presente nel database",
            "name.max" => "Il nome del brand non può superare i 100 caratteri"
        ];
    }
}
