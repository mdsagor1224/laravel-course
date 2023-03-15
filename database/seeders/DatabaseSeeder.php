<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\Platform;
use Illuminate\Database\Seeder;
use App\Models\Series;
use App\Models\Topic;
use App\Models\User;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $series = ['PHP','JAVASCRIPT','Wordpress','Laravel'];
        foreach($series as $item){
            Series::create([
                'name' => $item,
            ]);
        }

        $topics =['Eloquent','Validation','Testing','Authorization'];
        foreach($topics as $item){
            Topic::create([
                'name' => $item,
            ]);
        }

        $platforms = ['Laracasts','Laravel Daily','Codecourse','Spatie'];
        foreach($platforms as $item){
            Platform::create([
                'name' => $item,
            ]);
        }

        // create 50 user
        User::factory(50)->create();

        //create 100 course
      Course::factory(100)->create();

    }
}
