<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'firstName' => 'required|max:250',
            'lastName' => 'required|max:250',
            'username' =>'required|max:40|min:3',
            'email' => 'required|max:250|email',
            'password' => 'required|min:4'
        ];
    }
}
