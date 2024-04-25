<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OrderCard;
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
        $mostOrderedPlats = OrderCard::select('plats.id', 'plats.name', 'plats.price', 'plats.image', DB::raw('count(plats.id) as total'))
            ->join('cards', 'order_cards.card_id', '=', 'cards.id')
            ->join('plats', 'cards.plat_id', '=', 'plats.id')
            ->where('order_cards.status', 'confirmed')
            ->groupBy('plats.id', 'plats.name', 'plats.price', 'plats.image')
            ->orderByDesc('total')
            ->take(3)
            ->get();

        return view('home', ['plats' => $mostOrderedPlats]);
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
            if (Auth::user()->role == "resto") {
                return redirect()->route('resto.dashboard');
            }
            if (Auth::user()->role == "admin") {
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
        $resto = Auth::user()->id;

        $commands = OrderCard::with('card.user')
            ->join('cards', 'order_cards.card_id', '=', 'cards.id')
            ->where('cards.resto_id', $resto)
            ->select('order_cards.*', 'order_cards.status as order_status')
            ->count();
        $plats = Plat::where('resto_id', $resto)->count();

        return view('resto.dashboard', ['commands' => $commands, 'plats' => $plats]);
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
        $query = $request->input('query');

        $restos = User::where('name', 'like', "%$query%")
            ->Where('role', 'resto')
            ->get();

        return response()->json(['restos' => $restos]);
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

    public function admin()
    {
        $users = User::All()->where('role', 'user')->count();
        $restos = User::All()->where('role', 'resto')->count();
        $plats = Plat::All()->count();
        $AllUsers = User::All();
        $cat = Category::All()->count();
        $categories = Category::All();
        return view('admin.dashboard', ['users' => $users, 'restos' => $restos, 'plats' => $plats, 'cat' => $cat, 'categories' => $categories, 'allUsers' => $AllUsers]);
    }

    public function ban($id)
    {
        $user = User::findOrFail($id);
        $user->ban = true;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'User baned successfully');
    }

    public function unban($id)
    {
        $user = User::findOrFail($id);
        $user->ban = false;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'User unbanned successfully');
    }

}