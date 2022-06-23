<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Question;
use App\Models\User;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
        }
    public function quiz()
    {
        $user = User::where('id', auth()->user()->id)->first();
        if ( $user->role == 'admin') {
            return redirect()->route('candidat');
        }
        if ($user->points == 0) {
            $questions = Question::all()->shuffle();
            return view('quiz', compact('questions'));
        }
        return redirect()->route('confirm');
    }

    public function quizAdd(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        if (!$user->role == 'candidat') {
            return redirect()->route('login');
        }
        $data = $request->all();
        unset($data['_token']);
        $points = 0;


       foreach($data as $key => $value) {
            $resultat = new Result();
            $question = Question::findOrFail($key);
            $reponse = $question->reponses()->where('id', $value)->first();

            if($reponse->is_correct) {
                $points += $question->points;
            }
            $resultat->question_id = $question->id;
            $resultat->answer_id = $reponse->id;
            $resultat->candidat_id = auth()->user()->id;
            $resultat->save();
       }


        $user = User::find(auth()->user()->id);
        $user->points += $points;
        $user->save();
      
        return redirect()->route('confirm');
    }

    public function confirm()
    {
        $user = User::where('id', auth()->user()->id)->first();
        if ($user->role != 'candidat') {
            return redirect()->route('login');
        }
        return view('confirm');
    }
}
