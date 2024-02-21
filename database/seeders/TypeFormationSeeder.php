<?php

namespace Database\Seeders;

use App\Models\TypeFormation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeFormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeFormation::create(
            [
                'title' => 'Formation en ligne',
                'code' => 'online',
                'status' => true
            ]
        );
        TypeFormation::create(
            [
                'title' => 'Formation vidéo',
                'code' => 'video',
                'status' => true
            ]
        );
    }
}
