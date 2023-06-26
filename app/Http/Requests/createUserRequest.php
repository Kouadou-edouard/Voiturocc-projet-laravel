<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class createUserRequest extends FormRequest
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
            'nom' => 'required|min: 3',
            'prenom' => 'required|min: 3',
            'username' => 'required|min: 3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min: 3'
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le champ nom est requis',
            'nom.min' => 'Au moins 3 caractères',

            'prenom.required' => 'Le champ prenom est requis',
            'prenom.min' => 'Au moins 3 caractères',

            'username.required' => 'Le champ nom utilisateur est requis',
            'username.min' => 'Au moins 3 caractères',

            'email.required' => 'Le champ email est requis',
            'email.unique' => 'Cette adresse email est déjà lié à un compte',

            'password.required' => 'Le champ mot de passe est requis',
            'password.min' => 'Au moins 5 caractères'
        ];
    }
}
