<?php

namespace App\Http\Controllers\NewsController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = app(News::class);

        $categories = app(Category::class);

        return view('news/index', ['news' => $news->getNews(), 'categories' => $categories->getCategories(), 'recentNews' => $news->getNews()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = app(News::class);

        if(empty($news)){
            return response([
                'message' => '404 page not found'
            ], 404);
        }

        return view('pages/article', ['news' => $news->getNewsById($id)]);
    }

    public function showByCategory(string $category_id)
    {
        $news = $this->featchNewsByCategory($category_id);

        $categories = $this->fetchCategories();

        $category = $this->fetchCategories($category_id);

        if(!isset($category)){
            return response([
                'message' => '404 page not found'
            ], 404);
        }

        $recentNews = $this->fetchNews();

        return view('news/index', ['news' => $news, 'category' => $category, 'categories' => $categories, 'recentNews' => $recentNews]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
