<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;


Route::controller(AuthController::class)->group(function () {
    // PUBLIC
    Route::post("/api/v1/auth/login", "login");
    // AUTHENTICATED
    Route::post("/api/v1/auth/logout", "logout")->middleware("auth:sanctum");
});


Route::controller(UserController::class)->group(function () {
    // ADMIN
    Route::get("/api/v1/users", "index")->middleware(["auth:sanctum", "abilities:ADMIN"]);
    Route::get("/api/v1/users/{id}", "show")->middleware(["auth:sanctum", "abilities:ADMIN"]);
    Route::put("/api/v1/users/{id}", "update")->middleware(["auth:sanctum", "abilities:ADMIN"]);
    Route::patch("/api/v1/users/{id}", "restore")->middleware(["auth:sanctum", "abilities:ADMIN"]);
    Route::delete("/api/v1/users/{id}", "destroy")->middleware(["auth:sanctum", "abilities:ADMIN"]);
    // PUBLIC
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

// ADMIN
Route::controller(CountryController::class)->middleware(["auth:sanctum", "abilities:ADMIN"])
    ->group(function () {
        Route::get("/api/v1/countries", "index");
        Route::post("/api/v1/countries", "store");
        Route::get("/api/v1/countries/{id}", "show");
        Route::put("/api/v1/countries/{id}", "update");
        Route::patch("/api/v1/countries/{id}", "restore");
        Route::delete("/api/v1/countries/{id}", "destroy");
});

Route::controller(StateController::class)->group(function () {
    // PUBLIC
    Route::get("/api/v1/states", "index");
    // ADMIN
    Route::post("/api/v1/states", "store")->middleware(["auth:sanctum", "abilities:ADMIN"]);
    Route::get("/api/v1/states/{id}", "show")->middleware(["auth:sanctum", "abilities:ADMIN"]);
    Route::put("/api/v1/states/{id}", "update")->middleware(["auth:sanctum", "abilities:ADMIN"]);
    Route::patch("/api/v1/states/{id}", "restore")->middleware(["auth:sanctum", "abilities:ADMIN"]);
    Route::delete("/api/v1/states/{id}", "destroy")->middleware(["auth:sanctum", "abilities:ADMIN"]);
});

// ADMIN
Route::controller(StatusController::class)->middleware(["auth:sanctum", "abilities:ADMIN"])
    ->group(function () {
        Route::get("/api/v1/status", "index");
        Route::post("/api/v1/status", "store");
        Route::get("/api/v1/status/{id}", "show");
        Route::put("/api/v1/status/{id}", "update");
        Route::patch("/api/v1/status/{id}", "restore");
        Route::delete("/api/v1/status/{id}", "destroy");
});

// ADMIN
Route::controller(RoleController::class)->middleware(["auth:sanctum", "abilities:ADMIN"])
    ->group(function () {
        Route::get("/api/v1/roles", "index");
        Route::post("/api/v1/roles", "store");
        Route::get("/api/v1/roles/{id}", "show");
        Route::put("/api/v1/roles/{id}", "update");
        Route::patch("/api/v1/roles/{id}", "restore");
        Route::delete("/api/v1/roles/{id}", "destroy");
});

Route::controller(EventController::class)->group(function () {
    Route::get("/api/v1/events", "index");
    Route::post("/api/v1/events", "store")->middleware(["auth:sanctum", "abilities:ADMIN"]);
    Route::get("/api/v1/events/{id}", "show");
    Route::put("/api/v1/events/{id}", "update")->middleware(["auth:sanctum", "abilities:ADMIN"]);
    Route::patch("/api/v1/events/{id}", "restore")->middleware(["auth:sanctum", "abilities:ADMIN"]);
    Route::delete("/api/v1/events/{id}", "destroy")->middleware(["auth:sanctum", "abilities:ADMIN"]);
});

Route::controller(RegistrationController::class)->middleware(["auth:sanctum"])
    ->group(function () {
        Route::get("/api/v1/registrations", "index")->middleware(["abilities:ADMIN"]);
        Route::post("/api/v1/registrations", "store");
        Route::put("/api/v1/registrations/{id}", "update")->middleware(["abilities:ADMIN"]);
        Route::patch("/api/v1/registrations/{id}", "restore")->middleware(["abilities:ADMIN"]);
        Route::delete("/api/v1/registrations/{id}", "destroy")->middleware(["abilities:ADMIN"]);
});

