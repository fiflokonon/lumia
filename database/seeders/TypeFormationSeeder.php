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
                'title' => 'Formation certifiante',
                'code' => 'certificated',
                'status' => true
            ]
        );
        TypeFormation::create(
            [
                'title' => 'Formation spécifique',
                'code' => 'specific',
                'status' => true
            ]
        );

        TypeFormation::create(
            [
                'title' => 'Webinaire',
                'code' => 'webinar',
                'status' => true
            ]
        );

        TypeFormation::create(
            [
                'title' => 'Formation présentielle',
                'code' => 'onsite',
                'status' => true
            ]
        );
    }
}
