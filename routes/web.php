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

Route::post('/trigger-task', function (Illuminate\Http\Request $request) {
    $task = \App\Models\AITask::find($request->task_id);
    if (!$task) {
        return response()->json(['error' => 'Task not found'], 404);
    }

    // Send Task to n8n Webhook
    \Illuminate\Support\Facades\Http::post('https://eodxuxiuhp3hrig.m.pipedream.net', [
        'task_id' => $task->id,
        'task' => $request->task,
        'ai_employee_id' => $task->ai_employee_id
    ]);

    return response()->json(['message' => 'Task sent to n8n successfully']);
});
