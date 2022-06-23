<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Models\Question;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/type', TypeController::class.'@index')->name('type');
Route::post('/type/store', TypeController::class.'@store')->name('type.store');
Route::get('/type/destroy/{type}', TypeController::class.'@destroy')->name('type.destroy');
Route::get('/question', QuestionController::class.'@index')->name('question');
Route::get('/question/add', QuestionController::class.'@add')->name('question.add');
Route::post('/question/store', QuestionController::class.'@store')->name('question.store');
Route::post('/question/destroy/{question}', QuestionController::class.'@destroy')->name('question.destroy');
Route::get('/candidat', UserController::class.'@candidat')->name('candidat');
Route::get('/candidat/{candidat}', UserController::class.'@candidatShow')->name('candidat.detail');
Route::post('/candidat/store', UserController::class.'@candidatStore')->name('candidat.store');
Route::post('/register', RegisterController::class.'@register')->name('register');
Route::get('/', function () {

    if (Auth::check()) {
        return redirect('/quiz');
    }
    return view('login');
})->name('login');
Route::post('/', LoginController::class.'@authenticate' )->name('authenticate');
Route::get('/logout', LoginController::class.'@logout' )->name('logout');
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name("google.auth");
Route::get('/auth/redirect/confirm', LoginController::class.'@google' );
//quiz
Route::get('/quiz', ResultController::class.'@quiz' )->name('quiz');
Route::post('/quiz', ResultController::class.'@quizAdd')->name('quiz.add');
Route::get('/confirm', ResultController::class.'@confirm')->name('confirm');

//dashboard
Route::get('/dashboard', function () {

    //nombre de candidats
    $candidats = User::where('role', 'candidat')->count();
    //nombre de admins
    $admins = User::where('role', 'admin')->count();
    //nombre de questions
    $questions = Question::count();

    return view('admin.pages.dashboard', compact('candidats', 'admins', 'questions'));
})->name('dashboard');
