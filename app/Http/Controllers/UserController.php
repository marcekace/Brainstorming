<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        return response(User::with(
            ["role:id,description", "state:id,description"])->get()->makeHidden(["role_id", "state_id"])->all(), 200);
    }

    public function store(UserRequest $request)
    {
        return response(User::create($request->all())->toJson(JSON_PRETTY_PRINT), 201);
    }

    public function show(string $id)
    {
        return response(User::withTrashed()->with(
            ["role:id,description", "state:id,description"])->findOrFail($id)->makeHidden(["role_id", "state_id"])->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function update(UserRequest $request, string $id)
    {
        User::findOrFail($id)->update($request->all());

        return response(User::findOrFail($id)->toJson(JSON_PRETTY_PRINT), 201);
    }

    public function restore(string $id)
    {
        $user = User::onlyTrashed()->findOrFail($id);

        if ($user->trashed()) {
            $user->restore();
            return response($user->toJson(JSON_PRETTY_PRINT), 201);
        }
    }

    public function destroy(string $id)
    {
        return response([
            "status" => boolval(User::findOrFail($id)->delete())
        ], 201);
    }
}
