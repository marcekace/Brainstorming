<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    public function index(Request $request)
    {
        if ($request->bearerToken() !== null) {
            return response(Event::with(
                ["category:id,description"])->withTrashed()->get()->makeHidden(["category_id"])->all(), 200);
        }
        return response(Event::with(
            ["category:id,description"])->get()->makeHidden(["category_id"])->all(), 200);
    }

    public function store(EventRequest $request)
    {
        return response(Event::create($request->all())->toJson(JSON_PRETTY_PRINT), 201);
    }

    public function show(string $id)
    {
        return response(Event::withTrashed()->with(
            ["category:id,description"])->findOrFail($id)->makeHidden(["category_id"])->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function update(EventRequest $request, string $id)
    {
        Event::findOrFail($id)->update($request->all());

        return response(Event::findOrFail($id)->toJson(JSON_PRETTY_PRINT), 201);
    }

    public function restore(string $id)
    {
        $event = Event::onlyTrashed()->findOrFail($id);

        if ($event->trashed()) {
            $event->restore();
            return response($event->toJson(JSON_PRETTY_PRINT), 201);
        }
    }

    public function destroy(string $id)
    {
        return response([
            "status" => boolval(Country::findOrFail($id)->delete())
        ], 201);
    }
}
