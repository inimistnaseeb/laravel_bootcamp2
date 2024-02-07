<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\RouteCompiler;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => '/v1',
], function () {

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);
    Route::post('/signup', [App\Http\Controllers\API\AuthController::class, 'signup']);
    Route::get('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);

    //Question Routes
    Route::post('/question/create', [App\Http\Controllers\API\QuestionController::class, 'store']);
    Route::get('/question', [App\Http\Controllers\API\QuestionController::class, 'index']);
    Route::get('/question/edit/{id}', [App\Http\Controllers\API\QuestionController::class, 'edit']);
    Route::put('/question/update/{id}', [App\Http\Controllers\API\QuestionController::class, 'update']);
    Route::delete('/question/delete/{question}', [App\Http\Controllers\API\QuestionController::class, 'destroy']);


    //QuestionAnswer Routes
    // Route::post('/question_answer/create', [App\Http\Controllers\API\QuestionAnswerController::class, 'store']);

    //Quiz Routes
    Route::post('/quiz/create', [App\Http\Controllers\API\QuizController::class, 'store']);
    Route::get('/quiz', [App\Http\Controllers\API\QuizController::class, 'index']);
    Route::get('/quiz/show/{id}', [App\Http\Controllers\API\QuizController::class, 'show']);
    Route::get('/quiz/edit/{id}', [App\Http\Controllers\API\QuizController::class, 'edit']);
    Route::put('/quiz/update/{id}', [App\Http\Controllers\API\QuizController::class, 'update']);
    Route::delete('/quiz/delete/{quiz}', [App\Http\Controllers\API\QuizController::class, 'destroy']);


    //Quiz_attempts Route
    Route::post('/quizAttempt/create', [App\Http\Controllers\API\QuizAttemptController::class, 'store']);
    Route::get('/quizAttempt/show/{id}', [App\Http\Controllers\API\QuizAttemptController::class, 'show']);

    //Question_attempts Route
    Route::post('/questionAttempt/create', [App\Http\Controllers\API\QuestionAttemptController::class, 'store']);
    Route::get('/questionAttempt/show/{id}', [App\Http\Controllers\API\QuestionAttemptController::class, 'show']);

    //QuizSlot here adding question to the quiz routes
    // Route::post('/quiz/question/add', [App\Http\Controllers\API\QuizController::class, 'quizSlot']);

    //QuestionType
    Route::get('questionType', [App\Http\Controllers\API\QuestionTypeController::class, 'index']);

    //To restore all deleted data
    Route::get('/question/restoreAll', [App\Http\Controllers\API\QuestionController::class, 'restoreAll']);
});
