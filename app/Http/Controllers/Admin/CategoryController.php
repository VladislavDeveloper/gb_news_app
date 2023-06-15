<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = $this->fetchCategories();

        return view('Admin/category', ['categories' => $categories]);
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
