<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('a-i-employees', App\Http\Controllers\AIEmployeeController::class);
Route::resource('a-i-tasks', App\Http\Controllers\AITaskController::class);

Route::post('/aiemployee-webhook', function (Request $request) {
    $task = AITask::find($request->task_id);
    $task->update([
        'status' => 'completed',
        'response' => $request->response
    ]);

    return response()->json(['message' => 'Task updated']);
});