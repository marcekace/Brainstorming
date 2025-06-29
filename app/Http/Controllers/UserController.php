<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    public function index()
    {
        return response(User::all()->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function store(StoreUserRequest $request)
    {
        return response(User::create($request->all())->toJson(JSON_PRETTY_PRINT), 201);
    }
}
