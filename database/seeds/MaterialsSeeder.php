<?php

use App\Material;
use Illuminate\Database\Seeder;

class MaterialsSeeder extends Seeder
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
                'title' => 'Wood',
            ],
            [
                'title' => 'Metal',
            ],
            [
                'title' => 'Plastic',
            ],
            [
                'title' => 'Glass',
            ],
        ];
        foreach ($data as $value) {
            Material::create($value);
        }
    }
}
