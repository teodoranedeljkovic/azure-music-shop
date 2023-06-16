<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlbumRequest extends FormRequest
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
            'name' => 'required|max:150|',
            'dateReleased' => 'required',
            'image' => 'required|image',
            'length' => 'required|min:1|numeric',
            'description' => 'required|string',
            'artists' => 'required',
            'genres' => 'required'
        ];
    }

}
