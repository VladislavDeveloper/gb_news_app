<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use App\Services\Contracts\Parser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): RedirectResponse
    {
        $resources = DB::table('resources')->get('url');

        foreach($resources as $resource){
            dispatch(new NewsParsingJob($resource->url));
            // $parser->setLink($resource->url)->saveParseData();
        }

        return redirect()->route('admin.resources.index')->with('success', 'Data updating');
    }
}
