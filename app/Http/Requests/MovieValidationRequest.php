<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieValidationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'genre'=> 'required|string|max:20',
            'release_date'=> 'required|date',
            'language'=> 'required|string',
            'description'=> 'required|string',
            'trailers'=> 'required|string',
            'download_link'=> 'required|string',
        ];
    }
}
