<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class UserController extends Controller
{

    public function index(Request $request): View
    {
        return view('users/index');
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
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

        Validator::make($request->all(), $rules, $messages, $attributes)->validate();

        User::create($request->input());

        return redirect()->route('user.store')->with(['success' => 'Usuário registrado.']);
    }
}
