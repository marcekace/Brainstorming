<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\StatusRequest;

class StatusController extends Controller
{
    public function index(Request $request)
    {
        return response(Status::withTrashed()->get()->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function store(StatusRequest $request)
    {
        return response(Status::create($request->all())->toJson(JSON_PRETTY_PRINT), 201);
    }

    public function show(string $id)
    {
        return response(Status::findOrFail($id)->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function update(StatusRequest $request, string $id)
    {
        Status::findOrFail($id)->update($request->all());

        return response(Status::findOrFail($id)->toJson(JSON_PRETTY_PRINT), 201);
    }

    public function restore(string $id)
    {
        $status = Status::onlyTrashed()->findOrFail($id);

        if ($status->trashed()) {
            $status->restore();
            return response($status->toJson(JSON_PRETTY_PRINT), 201);
        }
    }

    public function destroy(string $id)
    {
        return response([
            "status" => boolval(Status::findOrFail($id)->delete())
        ], 201);
    }
}
