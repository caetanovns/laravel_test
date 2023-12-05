<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserController extends Controller
{


    public function index(): View
    {
        return view('users/index');
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request, UserService $userService): RedirectResponse
    {
        $userService->store($request->input());

        return redirect()->route('user.store')->with(['success' => 'Usuário registrado.']);
    }

    public function store_api(Request $request, UserService $userService): JsonResponse
    {
        try {
            $user = $userService->store($request->input());
            return response()->json(['success' => 'Usuário registrado', 'data' => $user], ResponseAlias::HTTP_CREATED);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], ResponseAlias::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
