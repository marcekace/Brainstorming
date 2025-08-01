<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\CountryRequest;

class CountryController extends Controller
{
    public function index()
    {
        return response(Country::withTrashed()->get()->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function store(CountryRequest $request)
    {
        return response(Country::create($request->all())->toJson(JSON_PRETTY_PRINT), 201);
    }

    public function show(string $id)
    {
        return response(Country::withTrashed()->findOrFail($id)->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function update(CountryRequest $request, string $id)
    {
        Country::findOrFail($id)->update($request->all());

        return response(Country::findOrFail($id)->toJson(JSON_PRETTY_PRINT), 201);
    }

    public function restore(string $id)
    {
        $country = Country::onlyTrashed()->findOrFail($id);

        if ($country->trashed()) {
            $country->restore();
            return response($country->toJson(JSON_PRETTY_PRINT), 201);
        }
    }

    public function destroy(string $id)
    {
        return response([
            "status" => boolval(Country::findOrFail($id)->delete())
        ], 201);
    }
}
