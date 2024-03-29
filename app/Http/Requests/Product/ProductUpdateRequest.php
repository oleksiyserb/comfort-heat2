<?php

namespace App\Http\Requests\Product;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
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
            'name' => [Rule::unique('products')->ignore($this->name, 'name'), 'required', 'max:255'],
            'price' => 'required|integer',
            'slug' => [Rule::unique('products')->ignore($this->slug, 'slug')],
            'excerpt' => 'required|min:20|max:255',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'body' => 'required',
            'status' => 'integer'
        ];
    }
}
