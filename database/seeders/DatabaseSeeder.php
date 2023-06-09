<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Course;
use App\Models\Platform;
use App\Models\Review;
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
        User::create([
            'name' => 'Admin',
            'email' => 'hi@sagor.me',
            'password' => bcrypt('password'),
            'type' => 1,
        ]);

        $series = [
            [
                'name' => 'PHP',
                'slug' => 'php',
                'image' =>'https://cdn.pixabay.com/photo/2017/08/05/11/16/log0-2582748_960_720.png'
            ],
            [
                'name' => 'JAVASCRIPT',
                'slug' => 'javascript',
                'image' =>'https://cdn.pixabay.com/photo/2017/08/05/11/16/log0-2582748_960_720.png'
            ],
            [
                'name' => 'Vue.js',
                'slug' => 'vuejs',
                'image' =>'https://cdn.pixabay.com/photo/2017/08/05/11/16/log0-2582748_960_720.png'
            ],
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
                'image' =>'https://cdn.pixabay.com/photo/2017/08/05/11/16/log0-2582748_960_720.png'
            ]
        ];
        foreach($series as $item){
            Series::create([
                'name' => $item['name'],
                'image' => $item['image'],
                'slug' => $item['slug'],

            ]);
        }

        $topics =['Eloquent','Validation','Testing','Authorization', 'Wordpress'];
        foreach($topics as $item){

            $slug = strtolower(str_replace('', '-', $item));

            Topic::create([
                'name' => $item,
                'slug' => $slug
            ]);
        }

        $platforms = ['Laracasts','Laravel Daily','Codecourse','Spatie'];
        foreach($platforms as $item){
            Platform::create([
                'name' => $item,
            ]);
        }

       Author::factory(10)->create();



        // create 50 user
        User::factory(50)->create();

        //create 100 course
      Course::factory(100)->create();

      $courses = Course::all();
      foreach($courses as $course){
            $topics = Topic::all()->random(rand(1,5))->pluck('id')->toArray();
            $course->topics()->attach($topics);

            $authors = Author::all()->random(rand(1,3))->pluck('id')->toArray();
            $course->authors()->attach($authors);

            $series = Series::all()->random(rand(1,4))->pluck('id')->toArray();
            $course->series()->attach($series);
       }

       Review::factory(100)->create();
    }
}
