<?php

namespace Database\Seeders;

use App\Enums\NewsStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news')->insert($this->fetchData());
    }

    protected function fetchData(): array
    {

        $response = [];

        for ($i=0; $i < 10; $i++) { 
            $response[] = [
                'title' => fake()->text(5),
                'description' => fake()->text(200),
                'image' => fake()->imageUrl(),
                'author' => fake()->userName(),
                'created_at' => now(),
                'updated_at' => now(),
                'status' => NewsStatus::ACTIVE->value,
            ]; 
        }

        return $response;
    }
}
