<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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


Route::get('/', [TaskController::class, 'index']);
Route::get('/add-task', [TaskController::class, 'addtask']);
Route::post('/submittask', [TaskController::class, 'submit']);
Route::get('/edittask/{taskid}', [TaskController::class, 'edit']);
Route::post('/updatetask/{taskid}', [TaskController::class, 'update']);
Route::get('/deletetask/{taskid}', [TaskController::class, 'delete']);
Route::get('/viewtask/{taskid}', [TaskController::class, 'view']);
Route::get('/completed/{taskid}', [TaskController::class, 'updatestatus']);


