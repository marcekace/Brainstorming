<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(AuthController::class)->group(function () {
    // PUBLIC
    Route::post("/api/v1/auth/login", "login");
    // AUTHENTICATED
    Route::post("/api/v1/auth/logout", "logout")->middleware("auth:sanctum");
});

// ADMIN
Route::controller(UserController::class)
    ->group(function () {
        Route::get("/api/v1/users", "index")->middleware(["auth:sanctum", "abilities:ADMIN"]);
        Route::post("/api/v1/users", "store");
});

// ADMIN
Route::controller(CategoryController::class)->middleware(["auth:sanctum", "abilities:ADMIN"])
    ->group(function () {
        Route::get("/api/v1/categories", "index");
        Route::post("/api/v1/categories", "store");
        Route::get("/api/v1/categories/{id}", "show");
        Route::put("/api/v1/categories/{id}", "update");
        Route::patch("/api/v1/categories/{id}", "restore");
        Route::delete("/api/v1/categories/{id}", "destroy");
});

Route::controller(EventController::class)->middleware(["auth:sanctum"])
    ->group(function () {
        Route::get("/api/v1/events", "index");
        Route::post("/api/v1/events", "store")->middleware(["ability:ORGANIZER,ADMIN"]);
        Route::get("/api/v1/events/{id}", "show");
        Route::put("/api/v1/events/{id}", "update")->middleware(["abilities:ADMIN"]);
        Route::patch("/api/v1/events/{id}", "restore")->middleware(["abilities:ADMIN"]);
        Route::delete("/api/v1/events/{id}", "destroy")->middleware(["abilities:ADMIN"]);
});

Route::controller(RegistrationController::class)->middleware(["auth:sanctum"])
    ->group(function () {
        Route::get("/api/v1/registrations", "index");
        Route::post("/api/v1/registrations", "store");
        Route::delete("/api/v1/registrations/{registration}", "destroy");
});

