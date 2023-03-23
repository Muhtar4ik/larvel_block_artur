<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ArticleUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:6',
            'content' => 'required|min:20',
            'slug' => ['required', Rule::unique('articles')->ignore($this->article)],
            'theme' => 'required|min:2',
            'photos.*' => 'nullable|mimes:jpg,jpeg,png',
            'is_published' => 'reqired|boolean'
        ];
    }
}
