<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{

    public function index(Request $request): View
    {
        return view('users/index');
    }

    public function post(Request $request): RedirectResponse
    {
        return redirect('/users');
    }
}
