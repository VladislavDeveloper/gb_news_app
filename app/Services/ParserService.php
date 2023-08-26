<?php

namespace App\Services;

use App\Enums\NewsStatus;
use App\Models\Category;
use App\Models\News;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Services\Contracts\Parser;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Enum;
use Orchestra\Parser\Xml\Facade;

class ParserService implements Parser
{

    public string $link;

    public function setLink(string $link): Parser
    {
        $this->link = $link;

        return $this;
    }

    public function saveParseData(): void
    {
        $xml = Facade::load($this->link);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'channel.description'
            ],
            'news' => [
                'uses' => [
                    'channel.item[title,description,category,author]'
                ]
            ],
        ]);

        foreach($data['news'] as $item){
            foreach($item as $news){

                $category = $this->createCatagory($news['category']);

                $news = News::create([
                    'title' => $news['title'],
                    'description' => $news['description'],
                    'author' => $news['author'],
                    'status' => 'ACTIVE'
                ]);

                if($news){
                    $news->categories()->attach($category);
                }
            }
        }
        
    }

    public function createCatagory(string $name): Collection
    {
        
        if(DB::table('categories')->where('name', $name)->exists()){

            $category = Category::where('name', $name)->get(["id", "name"]);

            return $category;
        }

        $category = Category::create([
            'name' => $name
        ]);

        return $category;
    }
}