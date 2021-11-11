<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventsRequest extends FormRequest
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
            'title' => ['required', 'max:100'],
            'message' => ['required'],
            'date' => ['required', 'date' ,'after:today'],  
            'NumP' => ['required','gte:2'],
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'titre',
            'message' => 'massage',
            'date' => "date",
            'NumP'=>'NumP'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Il faut spécifier un titre',
            'title.max' => 'Le titre ne doit pas contenir plus de 100 caractères',
            'message.required' => 'Il faut spécifier un message',
            'date.required' => 'Il faut spécifier une date',
            'date.date' => 'Le format de la date est incorrect',
            'NumP.required' => 'Il faut spécifier le nombre des participants',
            'title.gte' => 'Le nombre des participants doit etre superieur à 1',
        ];
    }
}
