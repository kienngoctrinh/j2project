<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{
    public function __construct()
    {
        $routeName   = Route::currentRouteName();
        $arr         = explode('_', $routeName);
        $arr         = array_map('ucfirst', $arr);
        $title       = implode(' - ', $arr);

        View::share('title', $title);
    }
    public function login()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        try {
            $user = User::query()
                ->where('email', $request->get('email'))
                ->firstOrFail();
            if (!Hash::check($request->get('password'), $user->password)) {
                throw new \Exception();
            }

            session()->put('id', $user->id);
            session()->put('name', $user->name);
            session()->put('role', $user->role);

            return redirect()->route('welcome');
        } catch (\Throwable $e) {
            return redirect()->route('login');
        }
    }

    public function registerMinistry()
    {
        return view('auth.register_ministry');
    }

    public function processRegisterMinistry(Request $request)
    {
        User::query()
            ->create([
                'name'     => $request->get('name'),
                'email'    => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'role'     => 2,
            ]);

        return redirect()->route('welcome');
    }

    public function registerTeacher()
    {
        return view('auth.register_teacher');
    }

    public function processRegisterTeacher(Request $request)
    {
        User::query()
            ->create([
                'name'     => $request->get('name'),
                'email'    => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'role'     => 3,
            ]);

        return redirect()->route('welcome');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('login');
    }
}
