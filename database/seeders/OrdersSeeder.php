<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order')->insert($this->fetchData());
    }

    protected function fetchData(): array
    {

        $response = [];

        for ($i=0; $i < 10; $i++) { 
            $response[] = [
                'customer' => fake()->userName(),
                'phone' => fake()->phoneNumber(),
                'email' => fake()->email(),
                'order' => fake()->text(30),
                'created_at' => now(),
                'updated_at' => now(),
            ]; 
        }

        return $response;
    }
}
