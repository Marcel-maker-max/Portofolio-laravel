<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    // Afficher la page de connexion administrateur
    public function showLogin() {

        return view('admin.login');
    }

    //Treaiter la connexion administrateur
    public function login(Request $request) {
        $request->validate([
            'password' => 'required'
        ]);
                // Vérifier si le mot de passe est correct
        if ($request->password === env('ADMIN_PASSWORD')) {
            // Créer une session pour se souvenir que l'admin est connecté
            session(['admin_logged_in' => true]);
            
            return redirect()->route('admin.projects.index')->with('success', 'Connexion réussie !');
        } else {
            return redirect()->route('admin.login')->with('error', 'Mot de passe incorrect.');
        }
    }

    // Déconnexion administrateur
    public function logout() {
        //supprimer la session administrateur
        session()->forget('admin_logged_in');

        return redirect()->route('home')->with('success', 'Déconnexion réussie.');
    }
};