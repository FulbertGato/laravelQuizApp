<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        //validate the form data
        $request->validate(
            [
                'email' => 'unique:users|email|required',
                'password' => 'required',
                'nom' => 'required',
                'prenom' => 'required',
            ],
            [
                'email.required' => 'Champ requis',
                'email.unique' => 'Ce mail existe déjà',
                'password.required' => 'Champ requis',
                'nom.required' => 'Champ requis',
                'prenom.required' => 'Champ requis',

            ]
        );
        //create a new user
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;

        //si cest le premier utilisateur, on le met en admin
        if (User::count() == 0) {
            $user->role = 'admin';
        }
        $user->save();
        return redirect()->route('login');

    }
}
