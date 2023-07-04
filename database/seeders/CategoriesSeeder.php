<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert($this->fetchData());
    }

    protected function fetchData(): array
    {

        $response = [];

        for ($i=0; $i < 5; $i++) { 
            $response[] = [
                'name' => "Категория № $i",
                'created_at' => now(),
                'updated_at' => now()
            ]; 
        }

        return $response;
    }
}
