<?php

namespace App\Http\Controllers\NewsController;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function __construct(
        protected NewsQueryBuilder $newsQueryBuilder,
        protected CategoriesQueryBuilder $categoriesQueryBulder
    )
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('news/index', ['news' => $this->newsQueryBuilder->getAll()]);     
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
    public function show(News $news)
    {
        return view('pages/article', ['news' => $news]);
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
