<?php

namespace Tests\Feature\Client;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    public function test_news_controller_index_return_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_news_controller_show_return_successful_response(): void
    {
        $response = $this->get('/news/1');

        $response->assertStatus(200);
    }

    public function test_news_controller_show_return_error_response(): void
    {
        $response = $this->get('/news/1111');

        $response->assertStatus(404);
    }
}
