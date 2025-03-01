<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskManager;
use Illuminate\Support\Facades\Route;



Route::get( "/login", [HomeController::class, "login"])->name("login");

Route::post("/login", [HomeController::class,"LoginPost"])->name("login.post");

Route::get( "/logout", [HomeController::class, "logout"])->name("logout");

Route::get("/register",[HomeController::class,"creates"])->name("register");

Route::post("/register", [HomeController::class,"registerPost"])->name("register.post");

Route::view(uri: "/home", view: "home")->name("home")->middleware('auth');
Route::view(uri: "/", view: "welcome")->name("welcome");

Route::get("/", [TaskManager::class,"ListTask"])->name("home")->middleware('auth');

    Route::get("tasks/add", [TaskManager::class,"addTask"])->name("tasks.add")->middleware('auth');

    Route::post("tasks/add", [TaskManager::class,"addTaskPost"])->name("tasks.add.post")->middleware('auth');

    Route::get("tasks/status/{id}", [TaskManager::class,"updateTaskStatus"])->name("tasks.status.update")->middleware('auth');

    Route::get("tasks/delete/{id}", [TaskManager::class,"deleteTask"])->name("tasks.delete")->middleware('auth');
Route::post('/tasks/update/{id}', [TaskManager::class, 'update'])->name('tasks.update');

Route::get('/tasks/edit/{id}', [TaskManager::class, 'edit'])->name('tasks.edit');
Route::post('/tasks/update/{id}', [TaskManager::class, 'update'])->name('tasks.update');
