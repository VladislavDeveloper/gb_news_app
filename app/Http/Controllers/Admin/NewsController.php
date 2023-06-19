<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $model = app(News::class);

        return view('Admin/news', ['newsList' => $model->getNews()]);
    }
    public function create()
    {
        $categories = $this->fetchCategories();

        return view('forms/news', ['categories' => $categories]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'author' => ['required', 'string'],
            'category' => ['required', 'string'],
            'status' => ['required'],
            'description' => ['required']
        ]);

        return response()->json($request->only('title', 'author', 'category', 'status', 'description'));
    }
}
