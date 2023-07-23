<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Parser $parser)
    {
        $url = "https://lenta.ru/rss/top7";

        $parser->setLink($url)->saveParseData();

        return 'success';
    }
}
