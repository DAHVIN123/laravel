<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'name' => 'Yoshika',
            'gender' => 'Female',
            'address' => 'BRUHHH',
            'photo' => 'main.png',
            'motto' => 'Hello',
        ]);
    }
}
