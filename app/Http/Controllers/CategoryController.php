<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->bearerToken() !== null) {
            return response(Category::withTrashed()->get()->toJson(JSON_PRETTY_PRINT), 200);
        }
        return response(Category::all()->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function store(CategoryRequest $request)
    {
        return response(Category::create($request->all())->toJson(JSON_PRETTY_PRINT), 201);
    }

    public function show(string $id)
    {
        return response(Category::withTrashed()->findOrFail($id)->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function update(CategoryRequest $request, string $id)
    {
        Category::findOrFail($id)->update($request->all());

        return response(Category::findOrFail($id)->toJson(JSON_PRETTY_PRINT), 201);
    }

    public function restore(string $id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);

        if ($category->trashed()) {
            $category->restore();
            return response($category->toJson(JSON_PRETTY_PRINT), 201);
        }
    }

    public function destroy(string $id)
    {
        return response([
            "status" => boolval(Category::findOrFail($id)->delete())
        ], 201);
    }
}
