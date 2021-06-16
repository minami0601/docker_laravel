<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'term' => 'nullable|integer|digits_between:1,2',
            'category_id' => 'nullable|integer|digits_between:1,2',
            'word' => 'nullable|string|max:100',
        ];
    }

    public function attributes()
    {
        return [
            'term' => '期生',
            'category_id' => 'カテゴリー',
            'word' => 'フリーワード'
        ];
    }
}
