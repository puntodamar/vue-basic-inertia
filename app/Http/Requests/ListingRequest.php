<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListingRequest extends FormRequest
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
            'beds' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'street' => 'required|string|max:255',
            'street_number' => 'required|numeric|max:1000|min:0',
            'baths' => 'required|integer|min:0',
            'area' => 'required|numeric|min:0',
            'city' => 'required|string|max:100',
            'code' => 'required|string|max:20',
        ];
    }
}
