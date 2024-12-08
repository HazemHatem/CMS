<?php

namespace App\Http\Requests\site\Articale;

use App\Rules\MinWords;
use Illuminate\Foundation\Http\FormRequest;

class ArtisalRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:100',
            'content' => ['required', 'string', new MinWords(200)],
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable',
        ];
    }
}
