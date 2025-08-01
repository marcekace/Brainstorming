<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\StateRequest;

class StateController extends Controller
{
    public function index(Request $request)
    {
        if ($request->bearerToken() !== null) {
            return response(State::with(
                ["country:id,description"])->withTrashed()->get()->makeHidden(["country_id"])->all(), 200);
        }
        return response(State::all()->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function store(StateRequest $request)
    {
        return response(State::create($request->all())->toJson(JSON_PRETTY_PRINT), 201);
    }

    public function show(string $id)
    {
        return response(State::withTrashed()->with(
            ["country:id,description"])->findOrFail($id)->makeHidden(["country_id"])->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function update(StateRequest $request, string $id)
    {
        State::findOrFail($id)->update($request->all());

        return response(State::findOrFail($id)->toJson(JSON_PRETTY_PRINT), 201);
    }

    public function restore(string $id)
    {
        $state = State::onlyTrashed()->findOrFail($id);

        if ($state->trashed()) {
            $state->restore();
            return response($state->toJson(JSON_PRETTY_PRINT), 201);
        }
    }

    public function destroy(string $id)
    {
        return response([
            "status" => boolval(State::findOrFail($id)->delete())
        ], 201);
    }
}
