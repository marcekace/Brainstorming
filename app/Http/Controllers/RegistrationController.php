<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function index()
    {
        return response(Registration::with(
            ["user:id,email", "event:id,title", "status:id:description"])
            ->get()->makeHidden(["user_id", "event_id", "status_id"])->all(), 200);
    }

    public function store(RegistrationRequest $request)
    {
        return response(Registration::create($request->all())->toJson(JSON_PRETTY_PRINT), 201);
    }

    public function update(RegistrationRequest $request, string $id)
    {
        Registration::findOrFail($id)->update($request->all());

        return response(Registration::findOrFail($id)->toJson(JSON_PRETTY_PRINT), 201);
    }

     public function restore(string $id)
    {
        $registration = Registration::onlyTrashed()->findOrFail($id);

        if ($registration->trashed()) {
            $registration->restore();
            return response($registration->toJson(JSON_PRETTY_PRINT), 201);
        }
    }

    public function destroy(string $id)
    {
        return response([
            "status" => boolval(Registration::findOrFail($id)->delete())
        ], 201);
    }
}
