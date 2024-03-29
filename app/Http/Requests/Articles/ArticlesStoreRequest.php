<?php

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesStoreRequest extends FormRequest
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
            'name' => 'required|unique:articles|max:255',
            'slug' => 'unique:articles|max:255',
            'image' => 'required|image|mimes:png,jpg',
            'excerpt' => 'required|min:20|max:255',
            'body' => 'required',
            'is_published' => 'integer'
        ];
    }
}
