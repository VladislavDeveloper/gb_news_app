<?php

namespace Tests\Feature\Admin;

use App\Models\Category;
use App\Queries\CategoriesQueryBuilder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
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
        $response = $this->get(route('admin.category.create'));

        $response->assertStatus(200);
    }

    public function test_admin_categories_save_new_category_to_db(): void
    {

        $category = [
            'name' => 'new title'
        ];

        $response = $this->post(route('admin.category.store'), $category);

        $this->assertDatabaseHas('categories', $category);

        $response->assertRedirect();
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

    // public function test_admin_categories_destroy_category(): void
    // {
    //     $category = DB::table('categories')->where('name', 'new title');

    //     $category_id = $category->value('id');

    //     $response = $this->delete("/category/destroy/$category_id");

    //     $response->assertStatus(200);

    //     $this->assertDatabaseMissing('categories', [
    //         'id' => $category_id
    //     ]);
    // }
}
