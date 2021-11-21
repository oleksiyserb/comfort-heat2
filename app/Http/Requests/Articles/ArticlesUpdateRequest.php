<?php

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticlesUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [Rule::unique('articles')->ignore($this->name, 'name'), 'required', 'max:255'],
            'slug' => [Rule::unique('articles')->ignore($this->slug, 'slug'), 'max:255'],
            'image' => 'image|mimes:png,jpg',
            'excerpt' => 'required|min:20|max:255',
            'body' => 'required',
            'is_published' => 'integer'
        ];
    }
}
