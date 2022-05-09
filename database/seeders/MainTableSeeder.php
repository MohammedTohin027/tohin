<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mains')->insert([
            'title' => "IT'S NICE TO MEET YOU",
            'sub_title' => "Welcome To Our Studio!",
            'image' => "admin/images/main/bg.jpg",
            'resume' => "admin/resume/resume.pdf",
        ]);
    }
}
