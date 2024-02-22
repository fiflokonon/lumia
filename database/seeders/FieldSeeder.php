<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fields')->insert([
            [
                'title' => 'Digital',
                'code' => 'digital',
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Management',
                'code' => 'management',
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Santé',
                'code' => 'sante',
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Administration',
                'code' => 'administration',
                'status' => true,
                'created_at' => now()
            ],
        ]);
    }
}
