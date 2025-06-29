<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    public function index()
    {
        return response(Event::all()->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function store(EventRequest $request)
    {
        return response(Event::create($request->all())->toJson(JSON_PRETTY_PRINT), 201);
    }

    public function show(string $id)
    {
        return response(Event::findOrFail($id)->toJson(JSON_PRETTY_PRINT), 200);
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
        return response(
            boolval(Event::findOrFail($id)->delete()) ? "True" : "False", 201);
    }
}
