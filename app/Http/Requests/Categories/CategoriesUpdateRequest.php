<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriesUpdateRequest extends FormRequest
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
            'name' => [Rule::unique('categories')->ignore($this->name, 'name'), 'required', 'max:255'],
            'slug' => [Rule::unique('categories')->ignore($this->slug, 'slug'), 'max:255'],
            'description' => 'required',
            'parent_id' => 'integer'
        ];
    }
}
