<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\StateRequest;

class StateController extends Controller
{
    public function index()
    {
        return response(State::all()->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function store(StateRequest $request)
    {
        return response(State::create($request->all())->toJson(JSON_PRETTY_PRINT), 201);
    }

    public function show(string $id)
    {
        return response(State::findOrFail($id)->toJson(JSON_PRETTY_PRINT), 200);
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
        return response(
            boolval(State::findOrFail($id)->delete()) ? "True" : "False", 201);
    }
}
