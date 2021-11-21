<?php

namespace App\Http\Requests\Projects;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectsUpdateRequest extends FormRequest
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
            'name' => [Rule::unique('projects')->ignore($this->name, 'name'), 'required', 'max:255'],
            'slug' => [Rule::unique('projects')->ignore($this->slug, 'slug'), 'max:255'],
            'image' => 'image|mimes:png,jpg',
            'excerpt' => 'required|min:20|max:255',
            'body' => 'required',
            'is_published' => 'integer'
        ];
    }
}
