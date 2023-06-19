<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $model = app(Category::class);

        return view('Admin/category', ['categories' => $model->getCategories()]);
    }

    public function create()
    {
        return view('forms/categories');
    }

    public function store(Request $request): Response
    {
        // dd($request->all());
        // dd($request->input('name'));
        // dd($request->only('token'));

        $request->validate([
            'name' => ['required', 'string']
        ]);

        return new Response($request->only('name'));
    }
}
