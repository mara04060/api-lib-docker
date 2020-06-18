<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'user_id' => 'required|integer|exists:users,id',
            'author_id' => 'required|integer|exists:authors,id',
            'name' => 'required|string',
            'quantity_page' => 'required|integer|min:3',
            'book_cover' => 'sometimes|base64dimensions:min_width=2,min_height=2'
        ];
    }
}
