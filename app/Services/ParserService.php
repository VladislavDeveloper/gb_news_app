<?php

namespace App\Services;

use App\Services\Contracts\Parser;
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
                    'channel.item[title, author, description]'
                ]
            ],
        ]);

        dd($data);
    }
}