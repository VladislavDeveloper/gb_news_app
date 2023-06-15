<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesControllerTest extends TestCase
{
    
    public function test_admin_categories_controller_index_successful_response(): void
    {
        $response = $this->get(route('admin.category.index'));

        $response->assertStatus(200);
    }
    
    public function test_admin_categories_controller_create_form_successful_response(): void
    {
        $response = $this->get(route('admin.category.index'));

        $response->assertStatus(200);
    }

    public function test_admin_categories_form_returns_json(): void
    {
        $dummy = [
            'name' => 'some category'
        ];

        $response = $this->post(route('admin.category.store'), $dummy);

        $response->assertStatus(200);

        $response->assertJson($dummy);
    }

    public function test_admin_categories_form_returns_error_if_empty(): void
    {
        $dummy = [];

        $response = $this->post(route('admin.category.store'), $dummy);

        $response->assertStatus(302);
    }

    public function test_admin_categories_form_returns_error_if_number(): void
    {
        $dummy = [
            'name' => 22
        ];

        $response = $this->post(route('admin.category.store'), $dummy);

        $response->assertStatus(302);
    }
}
