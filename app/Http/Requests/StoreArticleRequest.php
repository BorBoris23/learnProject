<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreArticleRequest extends FormRequest
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
            'header' => 'required|min:5|max:100',
            'content' => 'required',
            'description' => 'required|max:255',
            'owner_id' => 'required',
            'uniqueCode' => [
                'required',
                'regex:/^[-_0-9a-z]+$/i',
                Rule::unique('articles')->ignore($this->get('uniqueCode'), 'uniqueCode')
            ]
        ];
    }
}
