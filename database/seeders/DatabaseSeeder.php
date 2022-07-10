<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Si Thu Phyo',
            'email' => 'stp@gmail.com',
            'password' => bcrypt('123123123')
        ]);
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
        Category::factory(5)->create();
    }
}
