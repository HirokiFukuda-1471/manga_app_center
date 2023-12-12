<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'comic.title' => 'required|string|max:100',
            'comic.author' => 'required|string|max:100',
            'comic.day_of_week' => 'required',
            'comic.outline' => 'required|string|max:4000',
            'keywords_array'=>'required',
            'keyword_type'=> 'unique:keywords,keyword_type',
        ];
    }
}
