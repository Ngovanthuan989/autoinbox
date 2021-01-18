<?php

namespace App\Http\Requests\Login;

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
            'email' => 'required|unique:users',
            'name' => 'required',
            'phone' => 'required',
<<<<<<< HEAD
            'password' => 'required|min:8',
=======
            'password' => 'required',
>>>>>>> dcaf6e5a2d4cfefce7bb1f1b5acf5dffbc3b11ff
        ];
    }
}
