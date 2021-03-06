<?php

namespace Database\Seeders;

use App\Models\Idea;
use App\Models\Status;
use App\Models\Category;
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
        // \App\Models\User::factory(10)->create();

        Category::factory()->create(['name'=>'Category 1']);
        Category::factory()->create(['name'=>'Category 2']);
        Category::factory()->create(['name'=>'Category 3']);
        Category::factory()->create(['name'=>'Category 4']);

        Status::factory()->create(['name'=>'Open', 'classes'=>'bg-gray-200']);
        Status::factory()->create(['name'=>'Considering', 'classes'=>'bg-purple-200 text-white']);
        Status::factory()->create(['name'=>'In Progress', 'classes'=>'bg-yellow-200 text-black']);
        Status::factory()->create(['name'=>'Implemented', 'classes'=>'bg-green-200 text-white']);
        Status::factory()->create(['name'=>'Closed', 'classes'=>'bg-red-200 text-white']);

        Idea::factory(30)->create();


    }
}
