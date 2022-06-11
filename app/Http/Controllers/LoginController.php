<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
  public function index(Request $request)
  {
    return view('login.index');
  }

  public function store(Request $request)
  {

    $formFields = $request->only(['email', 'password']);

    if(Auth::attempt($formFields)) {
      alert(__('Добро пожаловать!'));

      return redirect()->intended(route('user'));
    }

    return redirect(route('login'))->withErrors([
      'email' => 'Не удалось авторизоваться'
    ]);
  }
}
