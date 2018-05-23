<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
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
                'title' => 'user',
            ],
            [
                'title' => 'admin',
            ]
        ];

        foreach ($data as $value) {
            Role::create($value);
        }
    }
}
