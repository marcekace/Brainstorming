<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    public function index()
    {
        return response(Role::withTrashed()->get()->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function store(RoleRequest $request)
    {
        return response(Role::create($request->all())->toJson(JSON_PRETTY_PRINT), 201);
    }

    public function show(string $id)
    {
        return response(Role::findOrFail($id)->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function update(RoleRequest $request, string $id)
    {
        Role::findOrFail($id)->update($request->all());

        return response(Role::findOrFail($id)->toJson(JSON_PRETTY_PRINT), 201);
    }

    public function restore(string $id)
    {
        $rol = Role::onlyTrashed()->findOrFail($id);

        if ($rol->trashed()) {
            $rol->restore();
            return response($rol->toJson(JSON_PRETTY_PRINT), 201);
        }
    }

    public function destroy(string $id)
    {
        return response([
            "status" => boolval(Role::findOrFail($id)->delete())
        ], 201);
    }
}
