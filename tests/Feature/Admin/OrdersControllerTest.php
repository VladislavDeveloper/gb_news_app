<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrdersControllerTest extends TestCase
{
   
    public function test_admin_orders_controller_index_successful_response(): void
    {
        $response = $this->get(route('admin.orders.index'));

        $response->assertStatus(200);
    }
    
    public function test_admin_orders_controller_create_form_successful_response(): void
    {
        $response = $this->get(route('admin.orders.create'));

        $response->assertStatus(200);
    }

    public function test_admin_order_save_to_db(): void
    {
        $order = [
            'customer' => 'Vladislav',
            'email' => 'test@mail.ru',
            'phone' => '89297771122',
            'order' => 'Some order'
        ];

        $response = $this->post(route('admin.orders.store'), $order);

        $this->assertDatabaseHas('order', $order);

        $response->assertRedirect(route('admin.orders.index'));

    }

    public function test_admin_orders_form_returns_error_if_empty(): void
    {
        $dummy = [];

        $response = $this->post(route('admin.orders.store'), $dummy);

        $response->assertStatus(302);
    }

    public function test_admin_orders_form_returns_error_if_incorrect_datatype(): void
    {
        $dummy = [
            'name' => 877,
            'email' => 'string',
            'phonenumber' => '89297771122',
            'order' => 'Some order'
        ];

        $response = $this->post(route('admin.orders.store'), $dummy);

        $response->assertStatus(302);
    }
}
