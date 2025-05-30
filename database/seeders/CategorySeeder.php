<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Information Technology',
            ],
            [
                'name' => 'Travel',
            ],
            [
                'name' => 'Food',
            ],
            [
                'name' => 'Health & Fitness',
            ],
            [
                'name' => 'Education',
            ],
        ];

        foreach($categories as $data)
        {
            Category::create($data);
        }
    }
}
