<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = '';
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->image = $imageName;
        $user->save();
        Auth::login($user);
        if ($user->role === "resto") {
            return redirect()->route('resto.dashboard');
        } elseif ($user->role === "admin") {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('allResto');
        }
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
                return redirect()->route('allResto');
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

    public function getRest()
    {
        $resto = User::All()->where('role', 'resto');
        return view('user.resto', ['restos' => $resto]);
    }

    public function search(Request $request)
    {
        $input = $request->input('title');
        $restos = User::where('name', 'like', '%' . $input . '%')->where('role', 'resto')->get();

        return response()->json($restos);
    }

    public function adminUsers()
    {
        $users = User::All()->where('role', 'user');
        return view('admin.users', ['users' => $users]);
    }

    public function adminResto()
    {
        $users = User::All()->where('role', 'resto');
        return view('admin.restos', ['users' => $users]);
    }

}