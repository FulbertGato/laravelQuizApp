<?php

namespace App\Http\Controllers;

use App\Http\Services\AutorisationService;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        if ($user->role == 'candidat') {
            return redirect()->route('login');
        }
        $types = Type::all();
        return view('admin.pages.type', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $user = User::where('id', auth()->user()->id)->first();
        if ($user->role == 'candidat') {
            return redirect()->route('login');
        }
         $request->validate(
        [
            'name' => 'unique:types|string|required|min:4',
        ],
        [
            'name.required' => ' Champ requis',
            'name.unique' => 'Ce nom existe déjà',
        ]
    );
        $nom = $request->name;
        $type = new Type();
        $type->name = $nom;
        $type->save();
        return redirect()->route('type');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $user = User::where('id', auth()->user()->id)->first();
        if ($user->role == 'candidat') {
            return redirect()->route('login');
        }
        if ($type->questions->count() > 0) {
            return redirect()->route('type')->with('error', 'Ce type contient des questions, vous ne pouvez pas le supprimer');
        }
        //destroy type
        $type->delete();
        return redirect()->route('type')->with('success', 'Type supprimé');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //return view('admin.pages.type_edit', compact('type'));
    }
}
