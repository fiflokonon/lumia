<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudyLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('study_levels')->insert([
            [
                'title' => 'CEP',
                'status' => true
            ],
            [
                'title' => 'BEPC',
                'status' => true
            ],
            [
                'title' => 'BAC',
                'status' => true
            ],
            [
                'title' => 'BAC+1',
                'status' => true
            ],
            [
                'title' => 'BAC+2',
                'status' => true
            ]
        ]);
    }
}
