<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());

        return response()->json($category);
    }

    public function show($id)
    {
        $category = Category::find($id);

        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json($category);
    }

    public function delete($id)
    {
        $category = Category::destroy($id);

        return response()->json($category);
    }
}
