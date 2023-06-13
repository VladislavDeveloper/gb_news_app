<?php

namespace App\Http\Controllers\NewsController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = $this->fetchNews();

        $categories = $this->fetchCategories();

        $recentNews = $this->fetchNews();

        return view('news/index', ['news' => $news, 'categories' => $categories, 'recentNews' => $recentNews]);
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
        $news = $this->fetchNews($id);

        if(empty($news)){
            return "404: Page not found";
        }

        return view('pages/article', ['news' => $news]);
    }

    public function showByCategory(string $category_id)
    {
        $news = $this->featchNewsByCategory($category_id);

        $categories = $this->fetchCategories();

        $category = $this->fetchCategories($category_id);

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
