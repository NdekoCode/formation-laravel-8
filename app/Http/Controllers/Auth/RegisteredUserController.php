<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\UserRegisterNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


/**
 * Est une classe pour enregistrer notre utilisateur dans la base de donné
 */
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     * ? Affiche le formulaire d'enregistrement de l'utilisateur
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     * ? Traiter une demande d'inscription entrante
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        // Valide dans un premier temps les informations rentrer par l'utilisateur
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Si tout va bien il enregistre l'utilisateur dans une base de donné et nous renvois l'utilisateur enregistrer
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // Une fois l'utilisateur créer il va nous créer un evenement d'enregistrement
        event(new Registered($user)); // Il dit  a l'application "un evenement à été  delencher, cet evenement concerne l'enregistrement d'un utilisateur"

        // On envois une notification à l'utilisateur
        $user->notify(new UserRegisterNotification($user));

        // On après l'evenement on connecte l'utilisateur
        Auth::login($user); // La façade "Auth" contient toute les fonctions et les methodes necessaire pour la maitrise du système d'authentification

        // Puis on redirige l'utilisateur connecté vers la page profile(Account) ou la page d'administration
        return redirect(RouteServiceProvider::HOME);
    }
}
