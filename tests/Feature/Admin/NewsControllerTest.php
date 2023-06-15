<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
   
    public function test_admin_news_controller_index_successful_response(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }
    
    public function test_admin_news_controller_form_successful_response(): void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function test_admin_news_controller_form_returns_json(): void
    {
        $dummy = [
            'title' => 'Some title',
            'author' => 'test@mail.com',
            'category' => 'category',
            'status' => 'DRAFT',
            'description' => 'Some text'
        ];

        $response = $this->post(route('admin.news.store'), $dummy);

        $response->assertStatus(200);

        $response->assertJson($dummy);
    }

    public function test_admin_news_controller_form_returns_error_if_empty(): void
    {
        $dummy = [
            'category' => 'category',
            'status' => 'DRAFT',
            'description' => 'Some text'
        ];

        $response = $this->post(route('admin.news.store'), $dummy);

        $response->assertStatus(302);
    }

    public function test_admin_news_controller_form_returns_error_if_wrong_type(): void
    {
        $dummy = [
            'title' => 99,
            'author' => 'test@mail.com',
            'category' => 'category',
            'status' => 'DRAFT',
            'description' => 'Some text'
        ];

        $response = $this->post(route('admin.news.store'), $dummy);

        $response->assertStatus(302);
    }
}
