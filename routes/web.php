<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function (Request $request) {
    return TaskController::index($request);
})->middleware('auth');

Route::post('/tasks', function (Request $request) {
    return TaskController::store($request);
})->middleware('auth');

Route::get('tasks/{id}/edit', function ($id) {
    return TaskController::update($id);
})->middleware('auth');

Route::put('tasks/{id}/edit', function (Request $request, $id) {
    return TaskController::edit($request, $id);
})->middleware('auth');

Route::delete('tasks/{id}/edit', function ($id) {
    return TaskController::destroy($id);
})->middleware('auth');

//auth
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', function (Request $request) {
    return AuthController::register($request);
});

Route::post('/login', function (Request $request) {
    return AuthController::login($request);
});

Route::get('/logout', function () {
    return AuthController::logout();
});
