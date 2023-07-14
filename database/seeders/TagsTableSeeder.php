<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'name'          => 'html',
                'description'   => '',
            ],
            [
                'name'          => 'js',
                'description'   => 'Progetti realizzati con esclusivo uso di tecnologie front-end',
            ],
            [
                'name'          => 'css',
                'description'   => 'Progetti realizzati con esclusivo uso di tecnologie back-end',
            ],
            [
                'name'          => 'laravel',
                'description'   => 'Progetti realizzati con uso di tecnologie miste: FE e BE',
            ],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}

