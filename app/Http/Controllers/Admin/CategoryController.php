<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Queries\CategoriesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function __construct(
        protected CategoriesQueryBuilder $categoriesQueryBuilder
    )
    {

    }

    public function index()
    {
        return view('Admin/category', ['categories' => $this->categoriesQueryBuilder->getAll()]);
    }

    public function create()
    {
        return view('forms/Categories/create');
    }

    public function store(Request $request): RedirectResponse
    {
        $category = $request->only(['name']);

        $category = Category::create($category);

        if($category !== false){
            return redirect()->route('admin.category.index')->with('success', 'category created');
        }

        return redirect()->route('admin.category.index')->with('error', 'category has not been saved');
    }

    public function edit(Category $category): View
    {
        return view('forms/Categories/edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $categoryName = $request->only('name');

        $category = $category->fill($categoryName);

        if($category->save()){
            return redirect()->route('admin.category.index')->with('success', 'Category updated successfully');
        }

        return redirect()->route('admin.category.index')->with('error', 'Category has not been updated');
    }

    public function destroy($id)
    {
        $category = Category::destroy($id);

        if($category !== false){
            return response()->json(['message' => 'category was deleted']);
        }

        return response()->json(['message' => 'category could not be deleted', 404]);

    }
}
