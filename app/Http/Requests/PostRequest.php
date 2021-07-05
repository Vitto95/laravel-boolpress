<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; /* cambiato da false */
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        /* inseriamo qui le nostre condizioni */
        return [
          'title' =>'required|max:20',
          'content' => 'required|min:3'
        ];
    }
    /* messaggi in caso di errore */
    public function messages(){
      return [
        'title.required' => 'Il titolo è un campo obbligatorio',
        'title.max' => 'Sono consentiti al massimo :max caratteri',
        'content.min' => 'Sono consentiti al minimo :min caratteri',
        'content.required' => 'Il contenuto è un campo obbligatorio'
      ];
    }
}
