<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portfolios')->insert([
            'title' => 'Explore',
            'sub_title' => 'Lorem ipsum dolor sit amet consectetur.',
            'small_image' => 'upload/no_image_3.jpg',
            'big_image' => 'upload/no_image_3.jpg',
            'description' => 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!',
            'client' => 'Explore',
            'category' => 'Graphic Design',
            'url' => '',
        ]);
    }
}