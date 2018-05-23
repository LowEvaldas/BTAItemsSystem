<?php

use App\Item;
use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Book',
                'count' => 4,
                'price' => 15,
                'category_id' => \App\Category::first()->id,
                'description' => 'A very good book',
            ],

            [
                'title' => 'Bicycle',
                'count' => 100,
                'price' => 15,
                'category_id' => \App\Category::first()->id,
                'description' => 'A very good bicycle',
            ],
        ];

        foreach ($data as $value){
            Item::create($value);
        }
    }
}
