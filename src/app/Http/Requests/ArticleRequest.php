<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required|string|max:50',
            'category_id' => 'required|string|max:1',
            'summary' => 'required|string|min:10',
            'url' => 'required|string|url',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'category_id' => 'カテゴリー',
            'summary' => '記事概要',
            'url' => 'URL',
        ];
    }
}
