<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestBook extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'book_name' => 'required|unique:books,book_name,'.$this->id,
            'book_category_id' => 'required',
            'book_author_id' => 'required',
            'book_description' => 'required',
            'book_price' => 'required',
            'book_number' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'book_name.required' => 'Trường này không được để trống',
            'book_name.unique' => 'Tên sách đã tồn tại',
            'book_category_id.required' => 'Trường này không được để trống',
            'book_author_id.required' => 'Trường này không được để trống',
            'book_description.required' => 'Trường này không được để trống',
            'book_price.required' => 'Trường này không được để trống',
            'book_number.required' => 'Trường này không được để trống'
        ];
    }
}
