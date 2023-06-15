<?php

namespace Tests\Feature\Client;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesControllerTest extends TestCase
{
    public function test_categories_controller_index_return_successful_response(): void
    {
        $response = $this->get('/category/2/news');

        $response->assertStatus(200);
    }
}
