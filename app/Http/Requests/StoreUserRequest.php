<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'id_role' => ['required','between:1,3'],  
            
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'name',
            'email' => 'email',
            'id_role' => "id_role",
            
        ];
    }
}
