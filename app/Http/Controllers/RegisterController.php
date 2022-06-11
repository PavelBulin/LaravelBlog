<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
      return view('register.index');
    }

    public function store(Request $request)
    {
      if (Auth::check()) {
        return redirect()->route('user.posts');
      }

      $validated = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'password' => 'required',
      ]);

      if (User::where('email', $validated['email'])->exists()) {
        return redirect(route('register'))->withErrors([
          'email' => 'Такой пользователь уже зарегистрирован'
        ]);

      }

      $user = User::create($validated);
      if ($user) {
        Auth::login($user);

        return redirect()->route('user');
      }

      return redirect(route('register'))->withErrors([
        'formError' => 'Произошла ошибка при сохранении пользователя'
      ]);

        if (true) { // если валидация не прошла возврат на форму
            return redirect()->back()->withInput();
        }

        return redirect()->route('user'); // .. вход в личный кабинет
    }
}
