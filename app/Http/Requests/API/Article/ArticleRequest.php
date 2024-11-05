<?php

namespace App\Http\Requests\API\Article;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'content' => 'required|string|min:10',
            'author_id' => 'required|numeric|exists:authors,id',
            'category_id' => 'required|numeric|exists:categories,id',
        ];
    }
}
