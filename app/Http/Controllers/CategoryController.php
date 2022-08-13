<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('settings.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('settings.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $inputs = $request->validated();

        Category::create($inputs);

        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('settings.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $inputs = $request->validated();

        $category->update($inputs);

        return redirect()->route('categories.index', compact('category'));
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route("categories.index");
    }
}
