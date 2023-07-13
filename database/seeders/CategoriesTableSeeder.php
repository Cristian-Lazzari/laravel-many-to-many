<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name'          => 'Uncategorized',
                'description'   => '',
            ],
            [
                'name'          => 'Front-End',
                'description'   => 'Progetti realizzati con esclusivo uso di tecnologie front-end',
            ],
            [
                'name'          => 'Back-End',
                'description'   => 'Progetti realizzati con esclusivo uso di tecnologie back-end',
            ],
            [
                'name'          => 'Full-Stack',
                'description'   => 'Progetti realizzati con uso di tecnologie miste: FE e BE',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
