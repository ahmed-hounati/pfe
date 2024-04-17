<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Plat;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getRegisterForm()
    {
        return view('auth.register');
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();
        return redirect()->route('loginForm');
    }

    public function getLoginForm()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }
    public function home()
    {
        // $plats = Plat::select('plats.*', DB::raw('COUNT(cards.plat_id) as total'))
        //     ->join('cards', 'cards.plat_id', '=', 'plats.id')
        //     ->groupBy('plats.id', 'plats.name', 'plats.price')
        //     ->orderByDesc('total')
        //     ->limit(3)
        //     ->get();

        return view('home');
    }




    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            if (Auth::user()->role === "resto") {
                return redirect()->route('resto.dashboard');
            }
            if (Auth::user()->role === "admin") {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
                'password' => 'The provided credentials do not match our records.'
            ]);
        }
    }

    public function resto()
    {
        return view('resto.dashboard');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}