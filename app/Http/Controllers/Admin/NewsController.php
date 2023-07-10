<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\Create;
use App\Http\Requests\News\Update;
use App\Models\News;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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

    public function store(Create $request)
    {

       $news = News::create($request->validated());

       if($news){

            $news->categories()->attach($request->getCategories());

            return redirect()->route('admin.news.index')->with('success', 'News saved');
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

    public function update(Update $request, News $news): RedirectResponse
    {

        $news = $news->fill($request->validated());

        if($news->save()){
            $news->categories()->sync($request->getCategories());

            return redirect()->route('admin.news.index')->with('success', 'News updated successfully');
        }

        return redirect()->route('admin.news.index')->with('error', 'News has not been updated');
    }

    public function destroy()
    {

    }
}
