<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserService
{
    /**
     * @throws ValidationException
     */
    public function store(array $user): User
    {
        $rules = [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6|max:20|confirmed',
            'password_confirmation' => 'required|min:6|max:20',
        ];

        $messages = [
            'required' => ':attribute é obrigatório(a).',
            'min' => ':attribute precisa ter pelo menos tamanho :min.',
            'max' => ':attribute não pode exceder :max caracteres.',
            'email' => ':attribute precisa ser válido.',
            'confirmed' => ':attribute precisa ser confirmada.'
        ];

        $attributes = [
            'name' => 'Nome Completo',
            'email' => 'Email',
            'password' => 'Senha',
            'password_confirmation' => 'Confirmação de Senha'
        ];

        Validator::make($user, $rules, $messages, $attributes)->validate();

        return User::create($user);
    }
}
