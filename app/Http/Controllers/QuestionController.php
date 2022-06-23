<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
        $questions = Question::all();

        return view('admin.pages.question', compact('questions'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $user = User::where('id', auth()->user()->id)->first();
        if ($user->role == 'candidat') {
            return redirect()->route('login');
        }
        $types = Type::all();

        return view('admin.pages.question_add', compact('types'));
    }

    /**
     * Store a resource
     *
     *
     */
    public function store(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        if ($user->role == 'candidat') {
            return redirect()->route('login');
        }

        $data = $request->all();
        $data = $data['outer'][0];
        if (empty($data['question'])) {
            return redirect()->route('question.add')->with('error', 'Veuillez saisir une question');
        }
        //verifier si la question est unique
        $question = $data['question'];
        $question_exist = Question::where('question', $question)->first();
        if ($question_exist) {
            return redirect()->route('question.add')->with('error', 'Cette question existe déjà');
        }
        //verifie si le type est selectionné
        if (empty($data['type'])) {
            return redirect()->route('question.add')->with('error', 'Veuillez selectionner un type');
        }
        //verifier si la reponse a au moins deux valeurs
        if (count($data['reponses']) < 2) {
            return redirect()->route('question.add')->with('error', 'Veuillez saisir au moins deux réponses');
        }
        //verifier si le points est saisie
        if (empty($data['points']) || $data['points'] <= 0) {
            return redirect()->route('question.add')->with('error', 'Veuillez saisir les points');
        }

        $question = new Question();
        $question->question = $data['question'];
        $question->type_id = $data['type'];
        $question->points = $data['points'];
        $question->save();


        $reponses = $data['reponses'];
        $reponse_correcte = $reponses[0]['reponse'];
        //$reponses = array_slice($reponses, 1);
        foreach ($reponses as $reponse) {
            $question->reponses()->create([
                'answer' => $reponse['reponse'],
                'is_correct' => false,
            ]);
        }

        $question->reponses()->where('answer', $reponse_correcte)->update(['is_correct' => true]);

        return redirect()->route('question.add')->with('success', 'Question enregistrée');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question){
        $user = User::where('id', auth()->user()->id)->first();
        if ($user->role == 'candidat') {
            return redirect()->route('login');
        }
        $types = Type::all();
        return view('admin.pages.question_show', compact('question', 'types'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question){
        $user = User::where('id', auth()->user()->id)->first();
        if ($user->role == 'candidat') {
            return redirect()->route('login');
        }
      
        $question->reponses()->delete();

        $question->delete();
        return redirect()->route('question')->with('success', 'Question supprimée');
    }



}
