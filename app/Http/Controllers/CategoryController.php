<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->paginate(8);
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
        return redirect()->route('categories.index')->with('flash-success', __('Category created successfully!'));
    }

    public function edit(Category $category)
    {
        return view('settings.categories.edit', compact('category'));
    }

    public function show()
    {
        return view('errors.404');
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $inputs = $request->validated();
        $category->update($inputs);
        return redirect()->route('categories.index', compact('category'))->with('flash-success', __('Category updated successfully!'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route("categories.index")->with('flash-success', __('Category deleted successfully!'));
    }
}
