<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function __construct(
        protected NewsQueryBuilder $newsQueryBuilder,
        protected CategoriesQueryBuilder $categoriesQueryBulder
    )
    {
    }

    public function index()
    {
        return view('Admin/news', ['newsList' => $this->newsQueryBuilder->getAll()]);
    }
    public function create()
    {
        return view('forms/news/create', ['categories' => $this->categoriesQueryBulder->getAll()]);
    }
    public function store(Request $request)
    {
       $news = $request->only(['title', 'author', 'status', 'description']);
       $categories = $request->input('categories');

       $news = News::create($news);
       if($news !== false){
            if($categories !== null){
                $news->categories()->attach($categories);

                return redirect()->route('admin.news.index')->with('success', 'News saved');
            }
       }

       return redirect()->route('admin.news.index')->with('error', 'News not saved');
    }

    public function edit(News $news): View
    {
        return view('forms/News/edit', [
            'news' => $news,
            'categories' => $this->categoriesQueryBulder->getAll(),
        ]);
    }

    public function update(Request $request, News $news): RedirectResponse
    {
        $newsData = $request->only(['title', 'author', 'status', 'description']);
        $categories = $request->input('categories');

        $news = $news->fill($newsData);

        if($news->save()){
            $news->categories()->sync($categories);

            return redirect()->route('admin.news.index')->with('success', 'News updated successfully');
        }

        return redirect()->route('admin.news.index')->with('error', 'News has not been updated');
    }

    public function delete()
    {

    }
}
