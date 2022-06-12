<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Permet de gerer la connection de l'utilisateur
 */
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     * ? Affiche le formulaire de connexion de l'utilisateur
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *? Traiter une demande d'authentification entrante(Elle permet de connecter l'utilisateur).
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

        $request->authenticate(); // Authenitie l'utilisateur depuis la requete avec la fonction "attempt()" en recuperant seulement en premier parametre le "mot de passe" et "l'email" et en deuxieme paramètre le "remember_me" qui est un booleen permettant de savoir si on veut se souvenir de l'utilisateur ou pas
        // Si cette methode echoue on envois un message d'erreur sinon on est connecté


        // On recréer une session d'authentification en regenerant un token
        $request->session()->regenerate();

        // On est rediriger vers la dashboard
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     * ? Elimine la session en cours et nous redirige vers la racine du site(Il nous deconnecte)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
