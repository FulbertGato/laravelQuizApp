<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
        public function candidat()
    {
        //verify if user is logged role is not admin
        $user = User::where('id', auth()->user()->id)->first();
        if ($user->role == 'candidat') {
            return redirect()->route('login');
        }
        //get all users with role 'candidat'
        $candidats = User::where('role', 'candidat')->get();

        return view('admin.pages.candidat', compact('candidats'));
    }

    public function candidatShow(User $candidat)
    {
        //verify if user is logged  is not admin
        $user = User::where('id', auth()->user()->id)->first();
        if ($user->role == 'candidat') {
            return redirect()->route('login');
        }
        //user whit results
        //dd($candidat->results);

        return view('admin.pages.candidat_show', compact('candidat'));

    }


}
