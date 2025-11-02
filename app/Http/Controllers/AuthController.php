<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // ============================
    // FORMULAIRE INSCRIPTION
    // ============================
    public function showRegisterForm()
    {
        return view('inscription');
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:150',
            'phone' => 'required|string|max:50|unique:users,telephone',
            'email' => 'required|email|unique:users,email',
            'ville' => 'required|string|max:150',
            'commune' => 'required|string|max:150',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:client,vendeur',
            'pays' => 'nullable|string|max:150',
            'shop' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'social' => 'nullable|string|max:50',
        ]);

        $pays = DB::table('pays')->where('code_iso', $request->pays)->first();

        DB::table('users')->insert([
            'nom_complet' => $request->fullname,
            'telephone' => $request->phone,
            'email' => $request->email,
            'ville' => $request->ville,
            'commune' => $request->commune,
            'pays_id' => $pays ? $pays->id : null,
            'role' => $request->role,
            'shop' => $request->role === 'vendeur' ? $request->shop : null,
            'location' => $request->role === 'vendeur' ? $request->location : null,
            'social' => $request->social,
            'mot_de_passe' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Inscription réussie 🎉'
        ]);
    }

    // ============================
    // FORMULAIRE CONNEXION
    // ============================
    public function showLoginForm()
    {
        return view('connexion');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $login = $request->login;
        $password = $request->password;

        $user = DB::table('users')
            ->where('telephone', $login)
            ->orWhere('email', $login)
            ->orWhere('nom_complet', $login)
            ->orWhere('social', $login)
            ->first();

        if ($user && Hash::check($password, $user->mot_de_passe)) {
            session(['afriba_user' => $user, 'role' => $user->role]);

            // 🔹 Définir la redirection selon le rôle
            $redirectUrl = $user->role === 'client' 
                ? route('welcome') 
                : ($user->role === 'vendeur' ? route('vendeur.dashboard') : null);

            return response()->json([
                'success' => true,
                'role' => $user->role,
                'message' => "Connexion {$user->role} réussie ✅",
                'redirect' => $redirectUrl
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Identifiants incorrects ❌'
        ]);
    }

    // ============================
    // DECONNEXION
    // ============================
    public function logout()
    {
        session()->forget(['afriba_user', 'role']);
        return redirect('/')->with('success', 'Déconnexion réussie ✅');
    }
}
