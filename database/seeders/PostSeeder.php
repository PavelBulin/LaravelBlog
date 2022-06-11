<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('posts')->insert([
        [
          'user_id' => 1,
          'title' => 'post1',
          'content' => 'Lorem ipsum, dolor sit amet',
        ],
        [
          'user_id' => 1,
          'title' => 'post2',
          'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing',
        ],
        [
          'user_id' => 2,
          'title' => 'post3',
          'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur, quisquam',
        ],
      ]);
    }
}
