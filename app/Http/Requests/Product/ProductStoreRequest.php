<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductStoreRequest extends FormRequest
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
            'name' => 'required|unique:products|max:255',
            'price' => 'required|integer',
            'slug' => 'unique:products|max:255',
            'excerpt' => 'required|min:20|max:255',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'body' => 'required',
            'status' => 'integer'
        ];
    }
}
